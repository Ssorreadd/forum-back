<?php

namespace Database\Factories\Blog;

use App\Models\Blog\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\BlogCategory>
 */
class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [],
        ];
    }

    public function configure(): Factory|BlogCategoryFactory
    {
        return $this->afterCreating(function (BlogCategory $blogCategory) {
            $blogCategory->update([
                'title' => [
                    'ru' => 'Категория '.$blogCategory->id,
                    'en' => 'Category '.$blogCategory->id,
                ],
            ]);
        });
    }
}
