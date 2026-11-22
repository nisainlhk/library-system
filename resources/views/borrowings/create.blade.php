@extends('layouts.app')

@section('title', $title ?? 'Tambah Peminjaman')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Tambah Peminjaman' }}</h1>
        <p class="lead-text">{{ $description ?? 'Pilih anggota dan buku yang akan dipinjam.' }}</p>
    </div>
    <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <article class="book-card">
            <div class="book-body">
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="member_id" class="form-label">Anggota</label>
                        <select name="member_id" id="member_id" class="form-select @error('member_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Anggota --</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                    {{ $member->member_code }} - {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="book_id" class="form-label">Buku</label>
                        <select name="book_id" id="book_id" class="form-select @error('book_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} (Stok: {{ $book->stock }})
                                </option>
                            @endforeach
                        </select>
                        @error('book_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="form-label">Jumlah Pinjam</label>
                        <input type="number" name="quantity" id="quantity" min="1"
                               value="{{ old('quantity', 1) }}"
                               class="form-control @error('quantity') is-invalid @enderror" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="book-actions">
                        <button type="submit" class="btn btn-primary">Simpan transaksi</button>
                        <a href="{{ route('borrowings.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection