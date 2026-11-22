@extends('layouts.app')

@section('title', $title ?? 'Kategori Buku')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Kategori Buku' }}</h1>
        <p class="lead-text">{{ $description ?? 'Kelola daftar kategori untuk pengelompokan koleksi buku.' }}</p>
    </div>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah kategori</a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="row g-4">
    @forelse ($categories as $category)
        <div class="col-12 col-md-6 col-lg-4">
            <article class="book-card">
                <div class="book-body">
                    <h2 class="book-title">{{ $category->name }}</h2>
                    <p class="book-author">{{ $category->description ?: 'Tidak ada deskripsi.' }}</p>

                    <div class="book-meta">
                        <span class="tag">{{ $category->books_count ?? $category->books()->count() }} Buku</span>
                    </div>

                    <div class="book-actions">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                              onsubmit="return confirm('Hapus kategori {{ $category->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state">
                <h2>Belum ada kategori</h2>
                <p>Tambahkan kategori pertama untuk mulai mengelompokkan buku.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah kategori</a>
            </div>
        </div>
    @endforelse
</div>
@endsection