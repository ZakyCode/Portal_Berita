@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <img src="{{ asset('images/ENT.png') }}" alt="Logo ENT" class="img-fluid" style="max-height: 100px;">
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Berita</h2>
    <a href="{{ route('news.create') }}" class="btn btn-success">
        <i class="fa-solid fa-plus"></i> Tambah Berita
    </a>
</div>

{{-- Notifikasi sukses --}}
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        })
    </script>
@endif

{{-- Notifikasi error --}}
@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '{!! implode("<br>", $errors->all()) !!}'
        })
    </script>
@endif

<table class="table table-striped table-hover shadow">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($news as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ Str::limit($item->content, 50) }}</td>
            <td>
                <a href="{{ route('news.show', $item->id) }}" class="btn btn-info btn-sm">
                    <i class="fa-solid fa-circle-info"></i> Detail
                </a>
                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline" id="deleteForm-{{ $item->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">
                        <i class="fa-solid fa-trash-can"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Belum ada berita</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        })
    }
</script>
@endsection
