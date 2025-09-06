<?php

namespace Database\Seeders;

use App\Models\TbTimbang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TbTimbangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TbTimbang::factory(100)->create();
    }
}
