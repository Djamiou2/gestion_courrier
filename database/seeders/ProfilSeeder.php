<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profil::factory()->administrateur()->create();
        Profil::factory()->president()->create();
        Profil::factory()->chefservice()->create();
        Profil::factory()->employe()->create();
    }
}
