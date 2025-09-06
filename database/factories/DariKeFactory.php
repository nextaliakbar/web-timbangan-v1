<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DariKe>
 */
class DariKeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Id' => fake()->unique()->randomNumber(8),
            'DARI_KE' => fake()->randomElement(['UNIMOS', 'MGFI']),
            'KODE' => fake()->unique()->randomNumber(8),
            'DARI' => fake()->randomElement(['UNIMOS', 'MGFI']),
            'KE' => fake()->randomElement(['UNIMOS', 'MGFI']),
            'KODE_PENERIMA' => fake()->randomNumber(5),
        ];
    }
}
