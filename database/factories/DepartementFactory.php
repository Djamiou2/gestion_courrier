<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departement>
 */
class DepartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departementNames = [
            "Département des opérations",
            "Département Administratif",
            "Département des Finance et Marketing",
        ];

        $departementName = Arr::random($departementNames);
        return [
            'nom' => $departementName,
        ];
    }
}
