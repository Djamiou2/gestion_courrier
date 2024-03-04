<?php

namespace Database\Seeders;

use App\Models\Destinataire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinataireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destinataire::factory()->times(20)->create();
    }
}
