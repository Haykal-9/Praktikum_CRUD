<?php

namespace Database\Factories;
use App\Models\Fakultas;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodi>
 */
class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_prodi' => $this->faker->jobTitle(),
            'kode_prodi' => strtoupper($this->faker->unique()->bothify('PRD###')),
            'fakultas_id' => Fakultas::factory(),
        ];
    }
}
