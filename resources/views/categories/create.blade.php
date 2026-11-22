@extends('layouts.app')

@section('title', $title ?? 'Tambah Kategori')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Tambah Kategori' }}</h1>
        <p class="lead-text">{{ $description ?? 'Tambahkan kategori baru ke sistem perpustakaan.' }}</p>
    </div>
    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <article class="book-card">
            <div class="book-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama kategori</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="book-actions">
                        <button type="submit" class="btn btn-primary">Simpan kategori</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection