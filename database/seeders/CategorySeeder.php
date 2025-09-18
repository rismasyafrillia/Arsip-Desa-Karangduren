<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name'=>'Undangan','description'=>'Undangan rapat, koordinasi, dsb','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Pengumuman','description'=>'Surat-surat yang terkait dengan pengumuman','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Nota Dinas','description'=>'Nota dinas internal','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Pemberitahuan','description'=>'Pemberitahuan umum','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
