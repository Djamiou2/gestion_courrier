<?php

namespace Database\Seeders;

use App\Models\Imputation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImputationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Imputation::factory()->times(10)->create();
    }
}
