<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Nisa Ainul Hakim',
            'Kim Doyoung',
            'Jeong Jaehyun',
            'Naravit Lertratkosum',
            'Phuwin Tangsakyuen',
        ];

        foreach ($names as $name) {
            Member::firstOrCreate(['name' => $name]);
        }
    }
}
