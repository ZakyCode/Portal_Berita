@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h4>Detail Berita</h4>
    </div>
    <div class="card-body">
        <h3>{{ $news->title }}</h3>
        <p class="text-muted">Dipublikasikan: {{ $news->created_at->format('d M Y') }}</p>
        <p>{{ $news->content }}</p>
        <a href="{{ route('news.index') }}" class="btn btn-secondary">Kembali <i class="fa-solid fa-right-to-bracket"></i></a>
    </div>
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
@endsection
