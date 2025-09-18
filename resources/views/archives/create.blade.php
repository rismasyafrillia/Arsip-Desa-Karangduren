@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">📂 Arsip Surat &raquo; Unggah</h1>

    {{-- Notifikasi error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form unggah arsip --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('archives.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control"
                           value="{{ old('nomor_surat') }}" placeholder="Contoh: 2022/PD3/TU/001">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Surat</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ old('title') }}" placeholder="Contoh: Nota Dinas WFH">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File Surat (PDF)</label>
                    <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('archives.index') }}" class="btn btn-secondary">&laquo; Kembali</a>
                    <button type="submit" class="btn btn-primary">💾 Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
