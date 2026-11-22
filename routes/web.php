<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);

     Route::resource('borrowings', BorrowingController::class);

    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
        ->name('borrowings.return');

    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);
});

Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('/users', UserController::class)->names('users');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class)->only(['index', 'store', 'destroy']);

Route::get('/members', [MemberController::class, 'index'])->name('members.index');