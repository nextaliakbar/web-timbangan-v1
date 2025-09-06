<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            'role' => 'ADMIN',
            'modules' => json_encode([
                'Peran User',
                'User Timbangan',
                'Serah Terima',
                'Timbangan',
                'Ganti JO',
                'Formula',
                'Kartu Stok'
            ]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
