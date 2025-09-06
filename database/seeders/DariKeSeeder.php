<?php

namespace Database\Seeders;

use App\Models\DariKe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DariKeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DariKe::factory(10)->create();
    }
}
