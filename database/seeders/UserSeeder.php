<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Telkom',
            'email' => 'admin@telkom.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dosen Telkom',
            'email' => 'dosen@telkom.com',
            'password' => Hash::make('password123'),
            'role' => 'dosen',
        ]);

        User::create([
            'name' => 'Mahasiswa Telkom',
            'email' => 'mahasiswa@telkom.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);
    }
}