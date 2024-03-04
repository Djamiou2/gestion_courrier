<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destinataire>
 */
class DestinataireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
             $isPerson = $this->faker->boolean; // Choisissez aléatoirement si c'est une personne ou une société

         return [
            'nom' => $isPerson ? $this->faker->name : $this->faker->company,
            'adresse' => $this->faker->address,
            'contact' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
