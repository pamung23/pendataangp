<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 150; $i++) {
            Desa::create([
                'desa' => 'Desa ' . $i, // Ganti ini sesuai dengan field nama desa Anda
                // Tambahkan kolom lain sesuai kebutuhan
            ]);
        }
    }
}
