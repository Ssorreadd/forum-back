<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_user_registration(): void
    {
        Artisan::call('passport:install');

        $response = $this->post('/api/auth/registration', [
            'email' => 'test@gmail.com',
            'password' => 'cOoLLPass212!!2',
            'username' => '@testUser14',
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'token',
            ],
        ]);
    }

    public function test_user_can_logout(): void
    {
        Artisan::call('passport:install');

        $user = User::factory()->create();

        $user->createToken('api');

        Passport::actingAs($user);

        $this->assertDatabaseCount('oauth_access_tokens', 1);

        $response = $this->post('/api/auth/logout');
        $this->assertDatabaseCount('oauth_access_tokens', 0);

        $response->assertNoContent();
    }
}
