<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
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

      $members = [
        'Nisa Ainul Hakim',
        'Kim Doyoung',
        'Jeong Jaehyun',
        'Naravit Lertratkosum',
        'Phuwin Tangsakyuen',
        ];

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

       $stock = 10;

        return view('dashboard.index', compact('books', 'stock', 'members', 'categories'));
    }

    
}    
?>