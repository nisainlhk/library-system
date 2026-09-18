<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Library System')</title>
</head>

<body>
    <header>
        <h1>Library System By Nisainlhk</h1>
        <p>Selamat datang di Sistem Informasi Perpustakaan</p>
        <nav>
            <a href="{{ route('buku') }}">Books</a> |
            <a href="{{ url('/categories') }}">Categories</a> |
            <a href="{{ url('/members') }}">Members</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>&copy; 2026 Library System By Nisainlhk. All rights reserved.</p>
    </footer>
</body>
</html>