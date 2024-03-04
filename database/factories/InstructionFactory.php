<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instruction>
 */
class InstructionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $instructionNames = [
            "Pour information",
            "Pour classement",
            "Pour note au Président",
            "Pour suite à donner",
            "Etude et Avis",
            "Attribution",
            "M'en parler",
            "Suivi",
            "Me voir",
            "Nécessaire à faire",
        ];

        $instructionName = Arr::random($instructionNames);
        return [
            'nom' => $instructionName,
        ];
    }
}
