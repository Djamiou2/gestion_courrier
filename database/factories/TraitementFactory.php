<?php

namespace Database\Factories;

use App\Models\Imputation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Traitement>
 */
class TraitementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'action' => $this->faker->word,
            'reponse' => $this->faker->sentence,

            'imputation_id' => function () {
                return Imputation::inRandomOrder()->first()->id;
            },

            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },

        ];
    }
}
