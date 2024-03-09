<?php

namespace Tests\Feature;

use App\Models\Post\PostCategory;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PostCategoryTest extends TestCase
{
    public function test_can_authorized_user_get_categories(): void
    {
        PostCategory::factory(10)->create();

        Passport::actingAs(User::factory()->create());

        $response = $this->get('/api/categories/');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    public function test_can_unauthorized_user_get_categories(): void
    {
        PostCategory::factory(10)->create();

        $response = $this->get('/api/categories/');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                ],
            ],
        ]);

        $response->assertStatus(200);
    }
}
