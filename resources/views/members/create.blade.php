@extends('layouts.app')

@section('title', $title ?? 'Tambah Anggota')

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title ?? 'Tambah Anggota' }}</h1>
        <p class="lead-text">{{ $description ?? 'Daftarkan anggota perpustakaan baru.' }}</p>
    </div>
    <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-6">
        <article class="book-card">
            <div class="book-body">
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="member_code" class="form-label">Kode anggota</label>
                        <input type="text" name="member_code" id="member_code"
                               placeholder="Contoh: MBR-001"
                               value="{{ old('member_code') }}"
                               class="form-control @error('member_code') is-invalid @enderror" required>
                        @error('member_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" id="address" rows="3"
                                  class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="book-actions">
                        <button type="submit" class="btn btn-primary">Simpan anggota</button>
                        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection