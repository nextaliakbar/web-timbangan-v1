<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TbTimbang>
 */
class TbTimbangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ID' => fake()->unique()->randomNumber(8),
            'ID_BARANG' => fake()->randomNumber(5),
            'UNIQ_ID' => fake()->unique()->randomNumber(8),
            'BERAT' => fake()->randomElement(['50', '100', '150', '200']),
            'BERAT_FILTER' => fake()->randomElement(['50', '100', '150', '200']),
            'QTY' => fake()->randomElement(['10', '20', '30', '40', '50']),
            'WAKTU' => fake()->dateTimeBetween('-6 months', 'now'),
            'NAMA_BARANG' => fake()->randomElement(['Barang 1', 'Barang 2', 'Barang 3']),
            'KATEGORI' => fake()->randomElement(['KATEGORI 1', 'KATEGORI 2', 'KATEGORI 3']),
            'NAMA_USER' => fake()->randomElement(['USER 1', 'USER 2', 'USER 3']),
            'DARI' => fake()->randomElement(['UNIMOS', 'MGFI']),
            'SHIFT' => fake()->randomElement(['1', '2', '3']),
            'PIC_SERAH' => fake()->randomElement(['', 'PIC_SERAH']),
            'PIC_TERIMA' => fake()->randomElement(['', 'PIC_TERIMA']),
            'ID_PRINT' => fake()->unique()->randomNumber(8),
            'SATUAN' => fake()->randomElement(['Kg', 'Hg', 'DAG']),
            'PCS' => fake()->randomElement(['100', '200', '300']),
            'TGL_PRODUKSI' => fake()->dateTimeBetween('-6 months', 'now'),
            'SHIFT_PRODUKSI' => fake()->randomElement(['1', '2', '3']),
            'KETERANGAN' => 'Ketrangan Timbang',
            'WTA' => fake()->randomNumber(5),
            'WHT' => fake()->randomNumber(5),
            'WAKTU_SINKRON' => fake()->dateTime(),
            'IDX_TB' => fake()->randomNumber(5),
            'ASAL' => fake()->randomElement(['MGFI', 'UNIMOS']),
            'TUJUAN' => fake()->randomElement(['MGFI', 'UNIMOS']),
            'PLANT' => fake()->randomElement([2, 7]) 
        ];
    }
}
