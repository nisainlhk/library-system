<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Category::create(['name' => 'Fiksi', 'description' => 'Buku fiksi dan novel']);
        Category::create(['name' => 'Sains & Teknologi', 'description' => 'Buku ilmu pengetahuan dan IT']);
        Category::create(['name' => 'Sejarah', 'description' => 'Buku sejarah dan biografi']);
        Category::create(['name' => 'Komik', 'description' => 'Buku komik dan bergambar']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
