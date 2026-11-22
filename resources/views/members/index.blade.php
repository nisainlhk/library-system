@extends('layouts.app')

@section('title', $title ?? 'Data Anggota')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Data Anggota' }}</h1>
        <p class="lead-text">{{ $description ?? 'Kelola data anggota perpustakaan yang dapat meminjam buku.' }}</p>
    </div>
    <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah anggota</a>
</div>

@if (session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="row g-4">
    @forelse ($members as $member)
        <div class="col-12 col-md-6 col-lg-4">
            <article class="book-card">
                <div class="book-body">
                    <h2 class="book-title">{{ $member->name }}</h2>
                    <p class="book-author">{{ $member->email ?? $member->address ?? 'Anggota perpustakaan' }}</p>

                    <div class="book-meta">
                        <span class="tag">{{ $member->member_code }}</span>
                        @if ($member->phone)
                            <span class="tag">{{ $member->phone }}</span>
                        @endif
                    </div>

                    <div class="book-actions">
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        <form action="{{ route('members.destroy', $member) }}" method="POST"
                              onsubmit="return confirm('Hapus anggota {{ $member->name }}?')">
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
                <h2>Belum ada anggota</h2>
                <p>Tambahkan anggota pertama agar dapat melakukan transaksi peminjaman buku.</p>
                <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah anggota</a>
            </div>
        </div>
    @endforelse
</div>
@endsection