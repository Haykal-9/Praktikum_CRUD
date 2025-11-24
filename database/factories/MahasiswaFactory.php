<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prodi;
use App\Models\Mahasiswa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NIM' => "M" . $this->faker->unique()->numberBetween(1000, 9999),
            'nama' => fake()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'id_prodi' => function () {
                return Prodi::inRandomOrder()->first()->id_prodi;
            },
            'foto' => null,
        ];
    }
}
