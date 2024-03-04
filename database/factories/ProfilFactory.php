<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function configure()
    {
        return $this->state([
            'nom' => $this->faker->randomElement([
                'administrateur',
                'president',
                'chefservice',
                'employe',
            ]),
        ]);
    }

    // Associer des ID spécifiques aux noms de profil

    public function administrateur()
    {
        return $this->state([
            'nom' => 'administrateur',
            'id' => 1,
        ]);
    }
    public function president()
    {
        return $this->state([
            'nom' => 'president',
            'id' => 2,
        ]);
    }
    public function chefservice()
    {
        return $this->state([
            'nom' => 'chefservice',
            'id' => 3,
        ]);
    }
    public function employe()
    {
        return $this->state([
            'nom' => 'employe',
            'id' => 4,
        ]);
    }
}
