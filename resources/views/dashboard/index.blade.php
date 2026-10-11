@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1>Dashboard</h1>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-6 col-lg">
        <div class="stat"><span class="stat-value">{{ $totalBooks }}</span><span class="stat-label">Judul buku</span></div>
    </div>
    <div class="col-6 col-lg">
        <div class="stat"><span class="stat-value">{{ $totalStock }}</span><span class="stat-label">Total Stok</span></div>
    </div>
    <div class="col-6 col-lg">
        <div class="stat {{ $outOfStock > 0 ? 'stat-warn' : '' }}"><span class="stat-value">{{ $outOfStock }}</span><span class="stat-label">Stok habis</span></div>
    </div>
    <div class="col-6 col-lg">
        <div class="stat"><span class="stat-value">{{ $totalCategories }}</span><span class="stat-label">Kategori</span></div>
    </div>
    <div class="col-12 col-lg">
        <div class="stat"><span class="stat-value">{{ $totalMembers }}</span><span class="stat-label">Anggota</span></div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="panel p-0">
            <div class="panel-title">Buku terbaru</div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr><th>Judul</th><th>Kategori</th><th class="text-end">Stok</th></tr>
                    </thead>
                    <tbody>
                        @forelse ($latestBooks as $book)
                            <tr>
                                <td>
                                    <a href="{{ route('books.show', $book) }}" class="fw-semibold">{{ $book->title }}</a>
                                    <div class="text-muted small">{{ $book->author }}</div>
                                </td>
                                <td>{{ $book->category->name ?? '-' }}</td>
                                <td class="text-end">{{ $book->stock }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">Belum ada buku.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="panel p-0">
            <div class="panel-title">Kategori terbanyak</div>
            <ul class="list-group list-group-flush">
                @forelse ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <span class="text-muted">{{ $category->books_count }} buku</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted py-4 text-center">Belum ada kategori.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
