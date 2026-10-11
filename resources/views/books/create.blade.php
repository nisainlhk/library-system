@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah buku</h1>
        <p class="lead-text">Isi data buku yang akan masuk ke koleksi.</p>
    </div>
</div>

<div class="panel">
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @include('books._form', ['submitLabel' => 'Simpan buku'])
    </form>
</div>
@endsection
