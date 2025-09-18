@extends('layouts.app')

@section('content')
<style>
.modal-custom {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
}
.modal-content-custom {
    background: #fff;
    padding: 20px;
    max-width: 400px;
    margin: 15% auto;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    text-align: center;
    animation: fadeIn 0.3s ease-in-out;
}
.modal-content-custom h3 { margin-bottom: 15px; color: #d9534f; }
.modal-footer { margin-top: 20px; display: flex; justify-content: space-around; }
.btn-danger { background: #d9534f; color: #fff; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; }
.btn-secondary { background: #6c757d; color: #fff; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer; }
@keyframes fadeIn { from {opacity: 0; transform: scale(0.9);} to {opacity: 1; transform: scale(1);} }
</style>

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
                        <!-- Tombol hapus dengan modal -->
                        <button class="btn btn-danger btn-sm" onclick="openModal({{ $archive->id }})">🗑 Hapus</button>
                        
                        <!-- Modal konfirmasi -->
                        <div id="modal-{{ $archive->id }}" class="modal-custom">
                            <div class="modal-content-custom">
                                <h3>Konfirmasi Hapus</h3>
                                <p>Apakah yakin ingin menghapus arsip <b>{{ $archive->title }}</b>?</p>
                                <div class="modal-footer">
                                    <form action="{{ route('archives.destroy', $archive) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger">Ya, Hapus</button>
                                    </form>
                                    <button type="button" class="btn-secondary" onclick="closeModal({{ $archive->id }})">Batal</button>
                                </div>
                            </div>
                        </div>

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

<script>
function openModal(id) {
    document.getElementById('modal-' + id).style.display = 'block';
}
function closeModal(id) {
    document.getElementById('modal-' + id).style.display = 'none';
}
// biar bisa klik di luar modal utk nutup
window.onclick = function(event) {
    document.querySelectorAll('.modal-custom').forEach(function(modal) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
}
</script>
@endsection
