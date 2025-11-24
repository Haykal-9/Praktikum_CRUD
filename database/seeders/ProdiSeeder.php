<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::factory()->create([
            'nama_prodi' => 'S1 Teknik Elektro',
            'fakultas' => 'Fakultas Teknik Elektro'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Teknik Industri',
            'fakultas' => 'Fakultas Rekayasa Industri'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Informatika',
            'fakultas' => 'Fakultas Informatika'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Akuntansi',
            'fakultas' => 'Fakultas Ekonomi dan Bisnis'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Ilmu Komunikasi',
            'fakultas' => 'Fakultas Komunikasi dan Bisnis'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Film dan Animasi',
            'fakultas' => 'Fakultas Industri Kreatif'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Teknik Biomedis',
            'fakultas' => 'Fakultas Teknik Elektro'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'D3 Sistem Informasi',
            'fakultas' => 'Fakultas Ilmu Terapan'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'D3 Digital Marketing',
            'fakultas' => 'Fakultas Ilmu Terapan'
        ]);

        Prodi::factory()->create([
            'nama_prodi' => 'S1 Rekayasa Perangkat Lunak',
            'fakultas' => 'Fakultas Informatika'
        ]);
    }
}