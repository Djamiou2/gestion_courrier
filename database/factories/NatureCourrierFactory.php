<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NatureCourrier>
 */
class NatureCourrierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public function definition(): array
    {
        $Naturescourriers = [
            "Lettre de motivation",
            "Lettre de recommandation",
            "Lettre de démission",
            "Lettre de demande ",
            "Note de service",
            "Avertissement ",
            "Lettre de nomination",
            "Courrier de résiliation",
            "Courrier de rappel de paiement",
            "Convocation",
            "Réclamation",
            "Plainte",
            "Facture",
        ];

        $instructionName = Arr::random($Naturescourriers);
        return [
            'nom' => $instructionName,
        ];
    }
}
