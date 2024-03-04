<?php

namespace Database\Seeders;

use App\Models\Courrier;
use App\Models\Departement;
use App\Models\Destinataire;
use App\Models\Expediteurs;
use App\Models\Imputation;
use App\Models\Instruction;
use App\Models\NatureCourrier;
use App\Models\Profil;
use App\Models\Service;
use App\Models\Traitement;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Departement::factory()->count(3)->create();
        Service::factory()->count(10)->create();
        Profil::factory()->count(4)->create();
        User::factory(30)->create();
        Instruction::factory()->count(10)->create();
        NatureCourrier::factory()->count(10)->create();
        Expediteurs::factory()->count(10)->create();
        Destinataire::factory()->count(10)->create();
        Courrier::factory()->count(10)->create();
        Imputation::factory()->count(10)->create();
        Traitement::factory()->count(10)->create();



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
