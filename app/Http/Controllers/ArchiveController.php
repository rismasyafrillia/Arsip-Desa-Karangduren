<?php
namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchiveController extends Controller
{
    public function index(Request $request){
        $q = $request->input('q');
        $query = Archive::with('category')->orderBy('uploaded_at','desc');
        if($q){
            $query->where('title','like', "%{$q}%");
        }
        $archives = $query->paginate(10)->withQueryString();
        return view('archives.index', compact('archives','q'));
    }

    public function create(){
        $categories = Category::all();
        return view('archives.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'nomor_surat'=>'required|string|max:100',
            'category_id'=>'required|exists:categories,id',
            'title'=>'required|string|max:255',
            'file'=>'required|mimes:pdf|max:10240' // max in KB (10240 KB = 10 MB)
        ]);

        $file = $request->file('file');
        $original = $file->getClientOriginalName();
        $filename = time().'_'.Str::random(8).'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/archives', $filename);

        Archive::create([
            'nomor_surat'=>$request->nomor_surat,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'file_name'=>$filename,
            'original_file_name'=>$original,
            'uploaded_at'=> now(),
        ]);

        return redirect()->route('archives.index')->with('success','Data berhasil disimpan');
    }

    public function show(Archive $archive){
        return view('archives.show', compact('archive'));
    }

    public function download(Archive $archive){
        $path = storage_path('app/public/archives/'.$archive->file_name);
        if(!file_exists($path)) abort(404);
        return response()->download($path, $archive->original_file_name);
    }

    public function destroy(Archive $archive){
        $path = storage_path('app/public/archives/'.$archive->file_name);
        if(file_exists($path)) unlink($path);
        $archive->delete();
        return redirect()->route('archives.index')->with('success','Data berhasil dihapus');
    }

    // optional: edit/update for changing file or metadata
}
