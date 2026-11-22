@extends('layouts.app')

@section('title', $title ?? 'Data Peminjaman')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Data Peminjaman' }}</h1>
        <p class="lead-text">{{ $description ?? 'Kelola transaksi peminjaman dan pengembalian buku perpustakaan.' }}</p>
    </div>
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah peminjaman</a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="row g-4">
    @forelse ($borrowings as $borrowing)
        <div class="col-12 col-md-6 col-lg-4">
            <article class="book-card">
                <div class="book-body">
                    <h2 class="book-title">{{ $borrowing->member->name }}</h2>
                    <p class="book-author">Petugas: {{ $borrowing->user->name }}</p>

                    <div class="book-meta">
                        <span class="tag">Pinjam: {{ $borrowing->borrowing_date }}</span>
                        <span class="tag">Tempo: {{ $borrowing->due_date }}</span>
                        <span class="stock {{ $borrowing->status === 'returned' ? 'stock-ok' : 'stock-out' }}">
                            {{ $borrowing->status === 'returned' ? 'Dikembalikan (' . $borrowing->return_date . ')' : 'Dipinjam' }}
                        </span>
                    </div>

                    <ul class="mt-3 mb-3 ps-3 small">
                        @foreach ($borrowing->details as $detail)
                            <li>{{ $detail->book->title }} ({{ $detail->quantity }} eks)</li>
                        @endforeach
                    </ul>

                    <div class="book-actions">
                        @if ($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing) }}" method="POST"
                                  onsubmit="return confirm('Proses pengembalian buku ini?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-primary">Kembalikan</button>
                            </form>
                        @else
                            <span class="btn btn-sm btn-outline-secondary disabled">Selesai</span>
                        @endif
                    </div>
                </div>
            </article>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state">
                <h2>Belum ada transaksi peminjaman</h2>
                <p>Catat transaksi peminjaman pertama untuk mulai melacak sirkulasi buku.</p>
                <a href="{{ route('borrowings.create') }}" class="btn btn-primary">Tambah peminjaman</a>
            </div>
        </div>
    @endforelse
</div>
@endsection