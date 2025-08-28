@extends('layouts.app')

@section('content')
<div class="card shadow-lg p-4">
    <h2 class="mb-4">📰 Tambah Berita Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Tulis isi berita..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Nama penulis" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="date" class="form-control" id="published_at" name="published_at" required>
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali <i class="fa-solid fa-right-to-bracket"></i></a>
    </form>
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
@endsection
