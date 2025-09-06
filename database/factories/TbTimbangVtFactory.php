<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TbTimbangVt>
 */
class TbTimbangVtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID' => fake()->randomNumber(8),
            'NO_DOK' => fake()->randomNumber(8),
            'NO_LOT' => fake()->randomNumber(8),
            'ITEM_CODE' => fake()->randomNumber(8),
            'BERAT' => fake()->randomElement(['10','20','30','40','50','60','70','80']),
            'BERAT_FILTER' => fake()->randomElement(['10','20','30','40','50','60','70','80']),
            'BATCH' => fake()->randomNumber(1),
            'KET' => 'KETERANGAN TIMBANGAN',
            'SERAH' => fake()->randomNumber(8),
            'TERIMA' => fake()->randomNumber(8),
            'VERIFIKATOR' => fake()->randomNumber(8),
            'WAKTU_TIMBANG' => fake()->dateTime(),
            'WAKTU_PROD' => fake()->dateTime(),
            'SHIFT_TIMBANG' => fake()->randomElement([1,2,3]),
            'SHIFT_PROD' => fake()->randomElement([1,2,3]),
            'PLANT' => fake()->randomElement([2,7]),
            'BERAT_PER_LOT' => fake()->randomNumber(2)
        ];
    }
}
