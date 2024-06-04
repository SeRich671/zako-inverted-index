<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => substr(fake()->uuid(), 0, 8),
            'title' => fake()->sentence(),
            'content' => fake()->sentences(1000, true),
        ];
    }
}
