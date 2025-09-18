@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        min-height: 100vh;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar tetap di kiri dari layouts.app -->

        <!-- Konten About -->
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card shadow-lg border-0" style="max-width: 600px; border-radius: 20px;">
                    <div class="card-body text-center p-4">
                        <!-- Foto Profil -->
                        <div class="mb-3">
                            <img src="{{ asset('images/foto.jpg') }}" 
                                 alt="Foto Profil" 
                                 class="img-fluid rounded shadow-lg" 
                                 style="width: 150px; height: 150px; object-fit: cover; border: 4px solid #fff;">
                        </div>
                        
                        <!-- Biodata -->
                        <h3 class="mb-3 text-primary fw-bold">About</h3>
                        <p><strong>Nama</strong> : Risma SYafrillia Nurfa'iza</p>
                        <p><strong>Prodi</strong> : D3-Manajemen Informatika PSDKU Kediri</p>
                        <p><strong>NIM</strong> : 2331730124</p>
                        <p><strong>Tanggal</strong> : 16 September 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
