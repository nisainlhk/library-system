@extends('layouts.app')

@section('title', 'Pengelolaan Pengguna')

@section('content')
<div class="page-header">
    <div>
        <h1>Pengelolaan Pengguna</h1>
        <p class="lead-text">Daftar seluruh akun pengguna sistem perpustakaan</p>
    </div>
</div>

<div class="panel p-0">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection