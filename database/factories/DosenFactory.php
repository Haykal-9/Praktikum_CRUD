<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NIP' => 'D' . $this->faker->unique()->numberBetween(1000, 9999),
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'foto' => null,
        ];
    }
}
