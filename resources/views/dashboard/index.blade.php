@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- <h1>Library System Dashboard</h1> -->
    <!-- <p>Selamat datang di Sistem Informasi Perpustakaan</p> -->

    <h2>Daftar Buku</h2>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book }}</li>
        @endforeach
    </ul>

    <h2>Stock Buku</h2>
    @if ($stock > 0)
        <p>Stok tersedia</p>
    @else
        <p>Stok habis</p>
    @endif

    <h2>Daftar Anggota</h2>
    <ul>
        @foreach ($members as $members)
            <li>{{ $members }}</li>
        @endforeach
    </ul>

    <h2>Daftar Kategori</h2>
    <ul>
        @foreach ($categories as $categories)
            <li>{{ $categories }}</li>
        @endforeach
    </ul>

@endsection


