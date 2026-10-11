@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="page-header">
    <div>
        <h1>{{ $title }}</h1>
        <p class="lead-text">{{ $description }}</p>
    </div>
</div>

<div class="panel p-0">
    <ul class="list-group list-group-flush">
        @forelse ($members as $member)
            <li class="list-group-item d-flex align-items-center gap-3">
                <span class="avatar">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                <div>
                    <div class="fw-semibold">{{ $member->name }}</div>
                    @if ($member->email)
                        <div class="text-muted small">{{ $member->email }}</div>
                    @endif
                </div>
            </li>
        @empty
            <li class="list-group-item text-muted py-4 text-center">Belum ada anggota. Jalankan <code>php artisan db:seed --class=MemberSeeder</code> untuk mengisi contoh data.</li>
        @endforelse
    </ul>
</div>
@endsection
