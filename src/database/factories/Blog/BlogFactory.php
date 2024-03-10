<?php

namespace Database\Factories\Blog;

use App\Models\Blog\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'category_id' => BlogCategory::all()->random()->id,
            'title' => fake()->title,
            'content' => fake()->realTextBetween(225, 500),
            'views' => fake()->numberBetween('100', '10000'),
        ];
    }
}
