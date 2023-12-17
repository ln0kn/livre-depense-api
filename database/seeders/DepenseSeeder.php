<?php

namespace Database\Seeders;

use App\Models\Depense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Depense::factory()->count(25)->create();
    }
}
