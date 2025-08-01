<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role jika belum ada
        Role::firstOrCreate(['name' => 'admin_master']);
        Role::firstOrCreate(['name' => 'petugas']);
        Role::firstOrCreate(['name' => 'masyarakat']);

        // Admin Master
        $admin = User::firstOrCreate(
            ['email' => 'admin@sipmas.com'],
            [
                'name' => 'Admin Master',
                'nik' => '1234567890000001',
                'password' => bcrypt('password'),
            ]
        );
        if (!$admin->hasRole('admin_master')) {
            $admin->assignRole('admin_master');
        }

        // Petugas
        $petugas = User::firstOrCreate(
            ['email' => 'petugas@sipmas.com'],
            [
                'name' => 'Petugas Satu',
                'nik' => '1234567890000002',
                'password' => bcrypt('password'),
            ]
        );
        if (!$petugas->hasRole('petugas')) {
            $petugas->assignRole('petugas');
        }

        // Masyarakat
        $user = User::firstOrCreate(
            ['email' => 'user@sipmas.com'],
            [
                'name' => 'Warga Biasa',
                'nik' => '1234567890000003',
                'password' => bcrypt('password'),
            ]
        );
        if (!$user->hasRole('masyarakat')) {
            $user->assignRole('masyarakat');
        }
    }
}
