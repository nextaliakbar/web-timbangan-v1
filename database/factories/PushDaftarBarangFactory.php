<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PushDaftarBarang>
 */
class PushDaftarBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Id' => fake()->randomNumber(8),
            'ID_BARANG' => fake()->randomNumber(8),
            'ID_SUNFISH' => fake()->randomNumber(8),
            'NAMA_BARANG' => fake()->randomElement(['Barang 1', 'Barang 2', 'Barang 3', 'Barang 4', 'Barang 5']),
            'itemCategoryType' => fake()->randomElement(['ITMK1', 'ITMK2', 'ITMK3', 'ITMK4', 'ITMK5']),
            'KATEGORI' => fake()->randomElement(['KATEGORI 1', 'KATEGORI 2', 'KATEGORI 3', 'KATEGORI 4', 'KATEGORI 5']),
            'SATUAN' => 'PCS',
            'MIN' => fake()->randomNumber(3),
            'MAX' => fake()->randomNumber(3),
            'PENGURANG' => fake()->randomNumber(),
            'FLAG' => fake()->randomElement([0,1]),
            'FLAG_UMS_2' => fake()->randomElement([0,1]),
            'FLAG_MGFI' => fake()->randomElement([0,1]),
            'STATUS' => fake()->randomElement([0,1]),
            'INACTIVE' => fake()->randomElement(['ACTIVE', 'INACTIVE'])
        ];
    }
}
