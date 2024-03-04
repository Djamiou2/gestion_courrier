<?php

namespace Database\Seeders;

use App\Models\Courrier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourrierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courrier::factory()->times(10)->create();
    }
}
