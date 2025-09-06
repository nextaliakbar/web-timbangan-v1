<?php

namespace Database\Seeders;

use App\Models\PushDaftarBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PushDaftarBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PushDaftarBarang::factory(50)->create();
    }
}
