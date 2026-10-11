@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title }}</h1>
        <p class="lead-text">{{ $description }}</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
</div>

<div class="row g-4">
    @forelse ($books as $book)
        <div class="col-6 col-md-4 col-lg-3">
            <article class="book-card">
                <a href="{{ route('books.show', $book) }}" class="book-cover-link" aria-label="Lihat detail {{ $book->title }}">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Sampul {{ $book->title }}" class="book-cover">
                    @else
                        <div class="book-cover book-cover-empty">
                            <span>{{ \Illuminate\Support\Str::limit($book->title, 40) }}</span>
                        </div>
                    @endif
                </a>

                <div class="book-body">
                    <h2 class="book-title">{{ $book->title }}</h2>
                    <p class="book-author">{{ $book->author }}</p>

                    <div class="book-meta">
                        <span class="tag">{{ $book->category->name ?? 'Tanpa kategori' }}</span>
                        <span class="stock {{ $book->stock > 0 ? 'stock-ok' : 'stock-out' }}">
                            {{ $book->stock > 0 ? 'Stok ' . $book->stock : 'Stok habis' }}
                        </span>
                    </div>

                    <div class="book-actions">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST"
                              onsubmit="return confirm('Hapus buku ini?')">
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
                <h2>Belum ada buku</h2>
                <p>Tambahkan buku pertama untuk mulai mengisi koleksi.</p>
                <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
            </div>
        </div>
    @endforelse
</div>
@endsection
