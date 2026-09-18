@extends('layouts.app')

@section('title', 'Daftar Anggota')
@section('content')
    <h1>Daftar Anggota</h1>
    <p>Berikut adalah daftar anggota perpustakaan:</p>

    <ul>
        @foreach ($members as $member)
            <li>{{ $member }}</li>
        @endforeach
    </ul>
@endsection