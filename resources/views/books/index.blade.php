@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>

    <ul>   
        @foreach ($books as $book)
            <h3>{{ $book->title }}</h3>
            <p>Author: {{ $book->author }}</p>
            <p>Year: {{ $book->year }}</p>
            <p>Stock: {{ $book->stock }}</p> 
        @endforeach
    </ul>

    @if ($stock > 0)
        <p>Stok tersedia</p>
    @else
        <p>Stok habis</p>
    @endif

@endsection
    