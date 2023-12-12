<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depense>
 */
class DepenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation' => $this->faker->word(),
            'montant' => $this->faker->numberBetween(5000, 250000),
            'paid_date'=> $this->faker->dateTimeThisYear(),
            'article_id' => Article::factory()
        ];
    }
}
