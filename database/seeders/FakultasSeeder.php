<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fakultas;
use App\Models\Prodi;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fakultas::factory()
            ->count(5)
            ->has(Prodi::factory()->count(3), 'prodi')
            ->create();
    }
}
