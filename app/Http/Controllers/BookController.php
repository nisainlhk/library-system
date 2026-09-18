<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
       $title = 'Daftar Buku';
       $description = 'Koleksi buku yang tersedia di perpustakaan';
       $books = [
        'Hujan by Tere Liye (2016)',
        'Filosofi Teras by Henry Manampiring (2018)',
        'Becoming by Michelle Obama (2018)',
        'Homo Deus: A Brief History of Tomorrow by Yuval Noah Harari  (2015)',
        'Brief Answers to the Big Questions by Stephen Hawking (2018)',
        'Life 3.0: Being Human in the Age of Artificial Intelligence by Max Tegmark (2017)',
        'Seni Merayu Tuhan by M. Fauzi Hidayat (2022)',
        'The Psychology of Money by Morgan Housel (2020)',
        'Sumur by Eka Kurniawan (2021)',
        'Glucose Revolution by Jessie Inchauspe (2022)',
      ];

       $stock = 10;

        return view('books.index', compact('title', 'description', 'books', 'stock'));
    }

    public function show($id)
    {
        return view ('books.show', compact('id'));
    }
}
