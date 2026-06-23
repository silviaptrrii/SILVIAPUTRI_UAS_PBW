<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@wardrobe.test'],
            [
                'name' => 'Admin Wardrobe',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $categories = [
            'Casual',
            'Formal',
            'Kampus',
            'Olahraga',
            'Party',
            'Outer',
            'Sepatu',
            'Aksesoris',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['nama_kategori' => $category]);
        }
    }
}
