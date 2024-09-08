<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mr. Haroon',
            'email' => 'mrharoon@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);
    
        User::create([
            'name' => 'Imran',
            'email' => 'imran@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);
    
        User::create([
            'name' => 'Noman',
            'email' => 'noman@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);
    }
}
