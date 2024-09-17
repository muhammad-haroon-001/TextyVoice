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
            'email' => 'haroon@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => '0',
            'hash' => '4260',
        ]);
    
        User::create([
            'name' => 'Imran',
            'email' => 'imran@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => '0',
            'hash' => '4321',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'user_type' => '0',
            'hash' => '9876',
        ]);
    }
}
