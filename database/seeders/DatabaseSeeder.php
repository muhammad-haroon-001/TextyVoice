<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mr. Haroon',
            'email' => 'mrharoon@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
            'hash' => '4260',
        ]);
    
        User::create([
            'name' => 'Imran',
            'email' => 'imran@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
            'hash' => '4321',
        ]);
    
        User::create([
            'name' => 'Noman',
            'email' => 'noman@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
            'hash' => '9876',
        ]);
    }
}
