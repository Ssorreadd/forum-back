<?php

namespace Tests\Feature;

use App\Models\Post\Post;
use App\Models\Post\PostCategory;
use App\Models\User;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_unauthorized_user_get_posts(): void
    {
        PostCategory::factory()->create();

        User::factory(10)->create();

        Post::factory(8)->create();

        Post::factory()->create([
            'user_id' => User::factory()->create()->id,
        ]);

        $response = $this->get('/api/posts');

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

    public function test_can_authorized_user_get_posts(): void
    {
        PostCategory::factory()->create();
        Post::factory()->create([
            'user_id' => User::factory()->create()->id,
        ]);

        Passport::actingAs(User::factory()->create());

        $response = $this->get('/api/posts/');

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

    public function test_can_unauthorized_user_view_post(): void
    {
        PostCategory::factory()->create();

        $post = Post::factory()->create([
            'user_id' => User::factory()->create()->id,
            'views' => 0,
        ]);

        $response = $this->get('/api/posts/'.$post->id.'/view');

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

    public function test_can_authorized_user_view_post(): void
    {
        PostCategory::factory()->create();

        $user = User::factory()->create();

        Passport::actingAs($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
            'views' => 0,
        ]);

        $response = $this->get('/api/posts/'.$post->id.'/view');

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

    public function test_can_user_store_post(): void
    {
        $category = PostCategory::factory()->create();

        Passport::actingAs(User::factory()->create());

        $response = $this->post('/api/posts/create', [
            'title' => fake()->title,
            'content' => fake()->randomHtml,
            'category_id' => $category->id,
        ]);

        $response->assertStatus(204);
    }
}
