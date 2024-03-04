<?php

namespace Database\Seeders;

use App\Models\Traitement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TraitementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Traitement::factory()->times(15)->create();
    }
}
