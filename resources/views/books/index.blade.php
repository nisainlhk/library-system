@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <ul>   
        @foreach ($books as $book)
            <li>{{ $book }}</li>
        @endforeach
    </ul>

    <!-- @if ($stock > 0)
        <p>Stok tersedia</p>
    @else
        <p>Stok habis</p>
    @endif -->

@endsection
    