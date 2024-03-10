<?php

namespace Tests\Feature;

use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_unauthorized_user_get_blogs(): void
    {
        BlogCategory::factory()->create();

        User::factory(10)->create();

        Blog::factory(8)->create();

        Blog::factory()->create([
            'user_id' => User::factory()->create()->id,
        ]);

        $response = $this->get('/api/blogs');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                    'user' => [
                        'id',
                        'username',
                        'locale',
                    ],
                    'category' => [
                        'id',
                        'title',
                    ],
                    'views',
                    'created_at',
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    public function test_can_authorized_user_get_blogs(): void
    {
        BlogCategory::factory()->create();
        Blog::factory()->create([
            'user_id' => User::factory()->create()->id,
        ]);

        Passport::actingAs(User::factory()->create());

        $response = $this->get('/api/blogs/');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'title',
                    'user' => [
                        'id',
                        'username',
                        'locale',
                    ],
                    'category' => [
                        'id',
                        'title',
                    ],
                    'views',
                    'created_at',
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    public function test_can_unauthorized_user_view_blog(): void
    {
        BlogCategory::factory()->create();

        $blog = Blog::factory()->create([
            'user_id' => User::factory()->create()->id,
            'views' => 0,
        ]);

        $response = $this->get('/api/blogs/'.$blog->id.'/view');

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'user' => [
                    'id',
                    'username',
                    'locale',
                ],
                'category' => [
                    'id',
                    'title',
                ],
                'content',
                'views',
                'created_at',
            ],
        ]);

        $response->assertStatus(200);
    }

    public function test_can_authorized_user_view_blog(): void
    {
        BlogCategory::factory()->create();

        $user = User::factory()->create();

        Passport::actingAs($user);

        $blog = Blog::factory()->create([
            'user_id' => $user->id,
            'views' => 0,
        ]);

        $response = $this->get('/api/blogs/'.$blog->id.'/view');

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'user' => [
                    'id',
                    'username',
                    'locale',
                ],
                'category' => [
                    'id',
                    'title',
                ],
                'content',
                'views',
                'created_at',
            ],
        ]);

        $response->assertStatus(200);
    }

    public function test_can_user_store_blog(): void
    {
        $category = BlogCategory::factory()->create();

        Passport::actingAs(User::factory()->create());

        $response = $this->post('/api/blogs/create', [
            'title' => fake()->title,
            'content' => fake()->randomHtml,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(204);
    }
}
