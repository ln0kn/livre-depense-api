<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ChargeFixe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChargeFixeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChargeFixe::factory()->count(1)->create();
        // ChargeFixe::factory(10)->create()->each(function ($charge) {
        //     $phone = Article::factory()->make();
        //     $charge->article()->save($phone); // phone() is hasOne ralationship in User.php        
        // });
    }
}
