<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Perpustakaan') | Sistem Perpustakaan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Literata:wght@600;700&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg site-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Perpustakaan</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}" href="{{ route('members.index') }}">Anggota</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container page">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand">Perpustakaan</div>
                    <p class="footer-text">Sistem informasi untuk mengelola buku, kategori, dan anggota perpustakaan.</p>
                </div>

                <nav aria-label="Navigasi footer">
                    <div class="footer-heading">Menu</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('books.index') }}">Buku</a></li>
                        <li><a href="{{ route('categories.index') }}">Kategori</a></li>
                        <li><a href="{{ route('members.index') }}">Anggota</a></li>
                    </ul>
                </nav>

                <div>
                    <div class="footer-heading">Aksi cepat</div>
                    <ul class="footer-links">
                        <li><a href="{{ route('books.create') }}">Tambah buku</a></li>
                        <li><a href="{{ route('categories.index') }}">Tambah kategori</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>Sistem Perpustakaan By Nisainlhk &copy; 2026. All rights reserved.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
