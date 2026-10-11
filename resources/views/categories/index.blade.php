@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="page-header">
    <div>
        <h1>Kategori</h1>
        <p class="lead-text">Kelompokkan buku agar mudah dicari.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="panel">
            <h2 class="h5 mb-3">Tambah kategori</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama kategori</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan kategori</button>
            </form>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="panel p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Buku</th>
                            <th><span class="visually-hidden">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="fw-semibold">{{ $category->name }}</td>
                                <td class="text-muted">{{ $category->description ?? '-' }}</td>
                                <td class="text-end">{{ $category->books_count }}</td>
                                <td class="text-end">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                          onsubmit="return confirm('Hapus kategori ini? Buku di dalamnya menjadi tanpa kategori.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">Belum ada kategori. Tambahkan lewat form di samping.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
