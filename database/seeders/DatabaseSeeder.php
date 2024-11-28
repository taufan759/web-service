<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Taufan Akbar',
            'email' => 'taufan@gmail.com',
            'password' => Hash::make('123456'), 
        ]);

        User::create([
            'name' => 'Nurul Reny Agustin',
            'email' => 'reny@gmail.com',
            'password' => Hash::make('123456'), 
        ]);

        User::create([
            'name' => 'Mohammad Andre F',
            'email' => 'andre@gmail.com',
            'password' => Hash::make('123456'), 
        ]);
    }
}
