<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/books', function () {
   // return 'Daftar Buku';
  //  return view('books.index');
//});

Route::get('/books', [BookController::class, 'index'])->name('buku');

Route::get('/books/{id}', [BookController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index'])->name('kategori');
Route::get('/members', [MemberController::class, 'index'])->name('anggota');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('anggota.show');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

?>