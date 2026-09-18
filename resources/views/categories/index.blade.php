@extends('layouts.app')

@section('title', 'Kategori Buku')

@section('content')
    <h1>Kategori Buku</h1>
    <p>Berikut adalah daftar kategori buku yang tersedia di perpustakaan:</p>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>
@endsection