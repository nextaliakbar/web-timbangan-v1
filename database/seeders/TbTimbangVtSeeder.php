<?php

namespace Database\Seeders;
use App\Models\TbTimbangVt;
use Illuminate\Database\Seeder;

class TbTimbangVtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TbTimbangVt::factory(100)->create();
    }
}
