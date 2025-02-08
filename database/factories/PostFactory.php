<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => fake()->title,
            'content' => fake()->text,
            'category_id' => Category:: query()->inRandomOrder()->first()->id,
            'preview_image' => fake()->imageUrl(),
            'main_image' => fake()->imageUrl(),

        ];
    }
}
