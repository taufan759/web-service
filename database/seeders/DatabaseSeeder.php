<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user data
        User::create([
            'name' => 'Muhammad Taufan Akbar',
            'email' => 'taufan@gmail.com',
            'password' => Hash::make('123456'), // Enkripsi password
        ]);

        User::create([
            'name' => 'Nurul Reny Agustin',
            'email' => 'reny@gmail.com',
            'password' => Hash::make('123456'), // Enkripsi password
        ]);

        User::create([
            'name' => 'Mohammad Andre F',
            'email' => 'andre@gmail.com',
            'password' => Hash::make('123456'), // Enkripsi password
        ]);

        // Tambahkan seeder lainnya di sini jika diperlukan
    }
}
