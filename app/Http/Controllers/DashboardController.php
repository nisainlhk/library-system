<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks      = Book::count();
        $totalStock      = (int) Book::sum('stock');
        $outOfStock      = Book::where('stock', 0)->count();
        $totalCategories = Category::count();
        $totalMembers    = Member::count();

        $latestBooks = Book::with('category')->latest()->take(5)->get();
        $categories  = Category::withCount('books')->orderByDesc('books_count')->take(6)->get();

        return view('dashboard.index', compact(
            'totalBooks',
            'totalStock',
            'outOfStock',
            'totalCategories',
            'totalMembers',
            'latestBooks',
            'categories'
        ));
    }
}
