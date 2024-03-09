<?php

namespace Database\Factories\Post;

use App\Models\Post\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post\PostCategory>
 */
class PostCategoryFactory extends Factory
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

    public function configure(): Factory|PostCategoryFactory
    {
        return $this->afterCreating(function (PostCategory $postCategory) {
            $postCategory->update([
                'title' => [
                    'ru' => 'Категория '.$postCategory->id,
                    'en' => 'Category '.$postCategory->id,
                ],
            ]);
        });
    }
}
