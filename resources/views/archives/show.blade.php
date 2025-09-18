@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📑 Arsip Surat</h1>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
       Klik <b>Lihat</b> pada kolom aksi untuk menampilkan surat.</p>

    <!-- Search -->
    <div class="mb-3">
        <form action="{{ route('archives.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Cari surat...">
            <button class="btn btn-primary">Cari</button>
        </form>
    </div>

    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($archives as $archive)
                <tr>
                    <td>{{ $archive->nomor_surat }}</td>
                    <td>{{ $archive->category->name }}</td>
                    <td>{{ $archive->title }}</td>
                    <td>{{ $archive->uploaded_at }}</td>
                    <td>
                        <form action="{{ route('archives.destroy', $archive) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus arsip ini?')">🗑 Hapus</button>
                        </form>
                        <a href="{{ route('archives.download', $archive) }}" class="btn btn-warning btn-sm">⬇️ Unduh</a>
                        <a href="{{ route('archives.show', $archive) }}" class="btn btn-info btn-sm">👁️ Lihat</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada arsip</td></tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('archives.create') }}" class="btn btn-success mt-3">+ Arsipkan Surat</a>
</div>
@endsection
