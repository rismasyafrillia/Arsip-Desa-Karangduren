<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = ['nomor_surat','category_id','title','file_name','original_file_name','uploaded_at'];
    protected $dates = ['uploaded_at'];
    public function category(){ return $this->belongsTo(Category::class); }
}
