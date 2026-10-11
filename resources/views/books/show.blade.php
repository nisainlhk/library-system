@extends('layouts.app')

@section('title', $book->title)

@section('content')
<a href="{{ route('books.index') }}" class="back-link">&larr; Kembali ke daftar buku</a>

<div class="panel">
    <div class="row g-4">
        <div class="col-md-4">
            @if ($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Sampul {{ $book->title }}" class="detail-cover">
            @else
                <div class="detail-cover book-cover-empty"><span>{{ $book->title }}</span></div>
            @endif
        </div>

        <div class="col-md-8">
            <h1 class="mb-1">{{ $book->title }}</h1>
            <p class="lead-text mb-3">oleh {{ $book->author }}</p>

            <div class="book-meta mb-4">
                <span class="tag">{{ $book->category->name ?? 'Tanpa kategori' }}</span>
                <span class="stock {{ $book->stock > 0 ? 'stock-ok' : 'stock-out' }}">
                    {{ $book->stock > 0 ? 'Stok tersedia: ' . $book->stock : 'Stok habis' }}
                </span>
            </div>

            <dl class="detail-list">
                <dt>Penerbit</dt>
                <dd>{{ $book->publisher ?? '-' }}</dd>
                <dt>Tahun terbit</dt>
                <dd>{{ $book->year ?? '-' }}</dd>
            </dl>

            <h2 class="h5 mt-4">Deskripsi</h2>
            <p class="description">{{ $book->description ?: 'Belum ada deskripsi untuk buku ini.' }}</p>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit buku</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST"
                      onsubmit="return confirm('Hapus buku ini? Tindakan ini tidak bisa dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus buku</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
