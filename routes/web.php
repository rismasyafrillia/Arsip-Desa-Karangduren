<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CategoryController;

// Default route diarahkan ke daftar arsip
Route::get('/', [ArchiveController::class,'index'])->name('archives.index');

// ----------------- Archives -----------------
Route::get('/archives/create', [ArchiveController::class,'create'])->name('archives.create');
Route::post('/archives', [ArchiveController::class,'store'])->name('archives.store');
Route::get('/archives/{archive}', [ArchiveController::class,'show'])->name('archives.show');
Route::get('/archives/{archive}/edit', [ArchiveController::class,'edit'])->name('archives.edit');   // ✅ ditambahkan
Route::put('/archives/{archive}', [ArchiveController::class,'update'])->name('archives.update');   // ✅ ditambahkan
Route::delete('/archives/{archive}', [ArchiveController::class,'destroy'])->name('archives.destroy');

// Custom download
Route::get('/archives/{archive}/download', [ArchiveController::class,'download'])->name('archives.download');

// ----------------- Categories -----------------
Route::resource('categories', CategoryController::class)->except(['show']);

// ----------------- About -----------------
Route::view('/about','about')->name('about');
