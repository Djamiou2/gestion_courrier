<?php

namespace Database\Factories;

use App\Models\Departement;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $serviceNames = [
            "Service étude",
            "Service adduction d'eau et forage",
            "Service énergetique",
            "Service comptabilité",
            "Service secrétariat",
            "Service cabinet du président",
            "Service Moyens Généraux",
            "Service magasinier",
            "Service Ressources Humaines",
            "Service Informatique",
            "Service marketing",
        ];

        $serviceName = Arr::random($serviceNames);
        return [
            // 'nom' => $this->faker->unique()->word,
            'nom' => $serviceName,
            'departement_id' => function () {
                return Departement::inRandomOrder()->first()->id;
            },
        ];
    }
}
