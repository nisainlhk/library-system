@extends('layouts.app')

@section('title', 'Edit ' . $book->title)

@section('content')
<div class="page-header">
    <div>
        <h1>Edit buku</h1>
        <p class="lead-text">{{ $book->title }}</p>
    </div>
</div>

<div class="panel">
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('books._form', ['submitLabel' => 'Simpan perubahan'])
    </form>
</div>
@endsection
