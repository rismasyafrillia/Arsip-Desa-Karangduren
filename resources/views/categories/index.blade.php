@extends('layouts.app')

@section('content')
<style>
/* Style dasar untuk modal */
.modal-custom {
    display: none; /* awalnya sembunyi */
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5); /* backdrop gelap */
}

/* Box modal */
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

.modal-content-custom h3 {
    margin-bottom: 15px;
    color: #d9534f;
}

.modal-footer {
    margin-top: 20px;
    display: flex;
    justify-content: space-around;
}

.btn-danger {
    background: #d9534f;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-secondary {
    background: #6c757d;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
}

/* Animasi masuk */
@keyframes fadeIn {
    from {opacity: 0; transform: scale(0.9);}
    to {opacity: 1; transform: scale(1);}
}
</style>

<div class="container">
    <h1>📂 Arsip Surat &raquo; Kategori</h1>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-2">{{ session('error') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description ?? '-' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Tombol Hapus -->
                        <button class="btn btn-danger btn-sm" onclick="openModal({{ $category->id }}, '{{ $category->name }}')">
                            Hapus
                        </button>

                        <!-- Modal Konfirmasi -->
                        <div id="modal-{{ $category->id }}" class="modal-custom">
                            <div class="modal-content-custom">
                                <h3>Konfirmasi Hapus</h3>
                                <p>Apakah yakin ingin menghapus kategori <b id="cat-name-{{ $category->id }}">{{ $category->name }}</b>?</p>
                                
                                <div class="modal-footer">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger">Ya, Hapus</button>
                                    </form>
                                    <button type="button" class="btn-secondary" onclick="closeModal({{ $category->id }})">Batal</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center">Belum ada kategori</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>

<script>
function openModal(id, name) {
    document.getElementById('modal-' + id).style.display = 'block';
}

function closeModal(id) {
    document.getElementById('modal-' + id).style.display = 'none';
}
</script>
@endsection
