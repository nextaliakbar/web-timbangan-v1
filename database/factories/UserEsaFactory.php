<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserEsa>
 */
class UserEsaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected static? string $password;
    public function definition(): array
    {
        $defaultPassword = 'c5ebb38d480d1b82b8950560fc82378edb652257078177fb79d730b15945f35b';

        return [
            'Id' => fake()->unique()->randomNumber(8),
            'USER' => fake()->unique()->userName(),
            'NAMA' => fake()->name(),
            'PASS' => static::$password ??= hash('sha256', 'kokola'),
            // 'PASS' => 'kokola',
            'PASS2' => $defaultPassword,
            'PIC' => fake()->randomElement(['PIC_SERAH', 'PIC_TERIMA']),
            'TEMPAT' => fake()->randomElement(['MGFI', 'UNIMOS', 'OS']),
            'BAGIAN' => fake()->randomElement([
                'PREPARATION', 'MGFI Gudang Formulasi',
                'QUALITY ASSURANCE', 'MGFI Gudang',
                'NDM', 'GUDANG_RETUR',
                'PRODUKSI', 'MGFI Produksi Formulasi',
                'GENERAL AFFAIR',
                'Unimos Gudang Formulasi', 'Unimos Gudang Biskuit', 'RnD', 'Unimos Preparation',
                'Unimos Gudang Maintenance', 'Unimos Gudang Wafer', 'Unimos Gudang NDM',
                'Unimos Gudang Retur', 'Unimos Gudang QA',
            ]),
            'HAK' => fake()->randomElement(['ADMIN', 'USER', 'EXTRA', 'WHT']),
            'AKSES' => fake()->randomElement(['3', '2', '1']),
            'FLAG' => fake()->randomElement(['0', '1']),
            'DEPT' => fake()->randomElement([
                'RnD', 'QA', 'Warehouse', 'Produksi', 'Maintenance', 'Personalia & Legal', 'TAC GA',
                'Produksi Biskuit', 'Warehouse', 'Produksi Wafer', 'MIS',
            ]),
            'ID_USER' => fake()->randomNumber(8),
            'PICPASS' => $defaultPassword,
            'PIC_VERIFIKATOR' => fake()->randomElement(['0', '1'])
        ];
    }
}
