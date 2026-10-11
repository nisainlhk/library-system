<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class)->only(['index', 'store', 'destroy']);

Route::get('/members', [MemberController::class, 'index'])->name('members.index');
