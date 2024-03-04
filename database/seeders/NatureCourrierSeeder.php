<?php

namespace Database\Seeders;

use App\Models\NatureCourrier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NatureCourrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NatureCourrier::factory()->times(15)->create();
    }
}
