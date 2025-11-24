<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semuaProdi = prodi::all();

        foreach ($semuaProdi as $prodi) {
        Mahasiswa::create([
            'NIM' => '003',
            'Nama' => 'Ega Fiandra',
            'Email' => 'ega@gmail.com',
            // 'id_prodi' => $prodi->id_prodi
        ]);
    }
}
}