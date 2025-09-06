<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $defaultPassword = 'c5ebb38d480d1b82b8950560fc82378edb652257078177fb79d730b15945f35b';

        return [
            'ID' => fake()->unique()->randomNumber(8),
            'USER' => fake()->unique()->userName(),
            'PASS' => static::$password ??= hash('sha256', 'kokola'),
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
            'FLAG' => fake()->randomElement(['0', '1']),
        ];
    }
}
