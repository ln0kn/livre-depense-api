<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ChargeFixe;
use App\Models\Constante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(1)->hasArticles(5)->create();
        Constante::factory()->count(1)->create();   








        
        // Depense::factory()->count(15)->create();
    }
}
