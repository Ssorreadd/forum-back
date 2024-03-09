<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request): Response|JsonResource
    {
        $user = User::firstWhere(['email' => $request->validated('email')]);

        if (Hash::check($request->validated('password'), $user->password)) {
            $user->update([
                'locale' => $request->validated('locale'),
            ]);

            return new JsonResource([
                'token' => $user->createToken('api')->accessToken,
            ]);
        }

        return response(['errors' => [
            'password' => [__('errors.login')],
        ]], 403);
    }

    public function logout(Request $request): Response
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->noContent();
    }

    public function changePassword(ChangePasswordRequest $request): JsonResource
    {
        $user = $request->user();

        $user->update([
            'password' => Hash::make($request->validated('password')),
        ]);

        $user->tokens()->delete();

        return new JsonResource([
            'token' => $user->createToken('api')->accessToken,
            'message' => __('success.password.update'),
        ]);
    }

    public function checkToken(Request $request): Response
    {
        return response()->noContent();
    }
}
