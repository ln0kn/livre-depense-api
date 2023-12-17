<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChargeFixe>
 */
class ChargeFixeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'periodisite'=> $this->faker->numberBetween(1, 4),
            'montant'=> $this->faker->numberBetween(10000, 1000000),
            'quantite'=> 1,
            'article_id' => Article::class
        ];
    }
}
