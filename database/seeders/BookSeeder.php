<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Hujan',
            'author' => 'Tere Liye',
            'year' => 2016,
            'stock' => 10,
        ]);

        Book::create([
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'year' => 2017,
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'Rindu',
            'author' => 'Tere Liye',
            'year' => 2018,
            'stock' => 7,
        ]);

        Book::create([
            'title' => 'Pulang',
            'author' => 'Tere Liye',
            'year' => 2019,
            'stock' => 3,
        ]);

        Book::create([
            'title' => 'Bintang',
            'author' => 'Tere Liye',
            'year' => 2020,
            'stock' => 8,
        ]);

        Book::create([
            'title' => 'Matahari',
            'author' => 'Tere Liye',
            'year' => 2021,
            'stock' => 6,
        ]);

        Book::create([
            'title' => 'Bulan',
            'author' => 'Tere Liye',
            'year' => 2022,
            'stock' => 4,
        ]);

        Book::create([
            'title' => 'Pelangi',
            'author' => 'Tere Liye',
            'year' => 2023,
            'stock' => 9,
        ]);

        Book::create([
            'title' => 'Senja',
            'author' => 'Tere Liye',
            'year' => 2024,
            'stock' => 2,
        ]);
    }
}
