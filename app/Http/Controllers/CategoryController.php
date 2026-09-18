<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Biografi',
            'Sejarah',
            'Sains',
            'Teknologi',
            'Agama',
            'Psikologi',
            'Sastra',
            'Kesehatan',
        ];
        return view('categories.index', compact('categories'));
    }
}
