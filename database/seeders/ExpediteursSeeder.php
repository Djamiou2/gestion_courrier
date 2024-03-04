<?php

namespace Database\Seeders;

use App\Models\Expediteurs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpediteursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expediteurs::factory()->times(20)->create();
    }
}
