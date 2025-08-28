@extends('layouts.app')

@section('content')
<div class="card shadow-lg p-4">
    <h2 class="mb-4">✏️ Edit Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $news->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $news->author }}" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Tanggal Publikasi</label>
            <input type="date" class="form-control" id="published_at" name="published_at" value="{{ $news->published_at }}" required>
        </div>

        <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Update</button>
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
