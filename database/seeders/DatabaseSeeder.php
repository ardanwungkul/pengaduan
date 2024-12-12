<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KategoriPelapor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'superadmin'
        ]);
        User::create([
            'name' => 'Ardan',
            'email' => 'ardanwungkul143@gmail.com',
            'password' => Hash::make(12345678),
            'role' => 'user'
        ]);
        KategoriPelapor::create([
            'nama_kategori' => 'Masyarakat Umum'
        ]);
        KategoriPelapor::create([
            'nama_kategori' => 'Instansi Pemerintah'
        ]);
        KategoriPelapor::create([
            'nama_kategori' => 'Organisasi Perangkat Daerah'
        ]);
    }
}
