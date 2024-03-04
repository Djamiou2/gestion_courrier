<?php

namespace Database\Factories;

use App\Models\Destinataire;
use App\Models\Expediteurs;
use App\Models\NatureCourrier;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courrier>
 */
class CourrierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'objet' => $this->faker->sentence,
            'contenu' => $this->faker->paragraph,
            'date_signature' => $this->faker->date,
            'date_arrivee' => $this->faker->date,
            'date_envoi' => $this->faker->date,
            //'delai_de_traitement' => $this->faker->date,
            'delai_de_traitement' => $this->faker->
            numberBetween($min = 1, $max = 30) . ' jour(s)',
            'importance' => $this->faker->randomElement(['important',
                'tres_important',
                'urgent',
                'important_et_urgent']),
        
            'statut' => $this->faker->randomElement(['en_attente_attribution','attribué',
                'en_attente_d_analyse', 
                'en_cours_d_analyse', 'analysé']),
            'type' => $this->faker->randomElement(['entrant', 'sortant', 'interne']),
            // pour selection des nature_courriers aléatoires
            'nature_id' => function () {
                return NatureCourrier::inRandomOrder()->first()->id;
            },
            'expediteur_id' => function () {
                return Expediteurs::inRandomOrder()->first()->id;
            },
            'destinataire_id' => function () {
                return Destinataire::inRandomOrder()->first()->id;
            },
            // pour selection des users aléatoires
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
           
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
