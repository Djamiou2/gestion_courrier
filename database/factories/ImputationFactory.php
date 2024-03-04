<?php

namespace Database\Factories;

use App\Models\Instruction;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imputation>
 */
class ImputationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    $hasUserImpute = $this->faker->boolean;
    $hasServiceImpute = !$hasUserImpute;

    return [
        'userImpute_id' => $hasUserImpute ? function () {
            return User::inRandomOrder()->first()->id;
        } : null,
        'service_id' => $hasServiceImpute ? function () {
            return Service::inRandomOrder()->first()->id;
        } : null,
        'instruction_id' => function () {
            return Instruction::inRandomOrder()->first()->id;
        },
        'decision' => $this->faker->sentence,
        'created_at' => $this->faker->dateTime,
        'updated_at' => $this->faker->dateTime,
        ];
    }
}
