<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin SIPMAS',
            'email' => 'admin@sipmas.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
