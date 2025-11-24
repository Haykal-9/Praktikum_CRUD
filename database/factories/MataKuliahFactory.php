<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_mk' => 'MK' . $this->faker->unique()->numberBetween(1000, 9999),
            'nama_mk' => $this->faker->unique()->words(3, true),
            'sks' => $this->faker->numberBetween(1, 4),
            'NIP' => function () {
                return \App\Models\Dosen::inRandomOrder()->first()->NIP;
            },
        ];
    }
}
