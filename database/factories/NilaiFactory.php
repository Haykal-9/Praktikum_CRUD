<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nilai>
 */
class NilaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NIM' => function () {
                return \App\Models\Mahasiswa::inRandomOrder()->first()->NIM;
            },
            'id_mk' => function () {
                return \App\Models\MataKuliah::inRandomOrder()->first()->id_mk;
            },
            'nilai' => $this->faker->randomFloat(2, 0, 100),
            'berkas' => null,
        ];
    }
}