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

        // Petugas kategori Keamanan
        $petugasKeamanan = User::firstOrCreate(
            ['email' => 'reza@sipmas.com'],
            [
                'name' => 'Reza Aditya',
                'nik' => '1234567890000002',
                'password' => bcrypt('password'),
            ]
        );
        if (!$petugasKeamanan->hasRole('petugas')) {
            $petugasKeamanan->assignRole('petugas');
        }

        // Petugas kategori Lingkungan
        $petugasLingkungan = User::firstOrCreate(
            ['email' => 'budi@sipmas.com'],
            [
                'name' => 'Budi',
                'nik' => '1234567890000004',
                'password' => bcrypt('password'),
            ]
        );
        if (!$petugasLingkungan->hasRole('petugas')) {
            $petugasLingkungan->assignRole('petugas');
        }

        // Petugas kategori Infrastruktur
        $petugasInfrastruktur = User::firstOrCreate(
            ['email' => 'andi@sipmas.com'],
            [
                'name' => 'Andi',
                'nik' => '1234567890000005',
                'password' => bcrypt('password'),
            ]
        );
        if (!$petugasInfrastruktur->hasRole('petugas')) {
            $petugasInfrastruktur->assignRole('petugas');
        }

        // Petugas kategori Kesehatan
        $petugasKesehatan = User::firstOrCreate(
            ['email' => 'siti@sipmas.com'],
            [
                'name' => 'Siti',
                'nik' => '1234567890000006',
                'password' => bcrypt('password'),
            ]
        );
        if (!$petugasKesehatan->hasRole('petugas')) {
            $petugasKesehatan->assignRole('petugas');
        }

        // Masyarakat
        $user = User::firstOrCreate(
            ['email' => 'user@sipmas.com'],
            [
                'name' => 'Warga Biasa',
                'nik' => '1234567890000007',
                'password' => bcrypt('password'),
            ]
        );
        if (!$user->hasRole('masyarakat')) {
            $user->assignRole('masyarakat');
        }
    }
}
