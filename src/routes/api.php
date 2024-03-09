<?php

use App\Enums\RouteMiddlewareEnum;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');

    Route::middleware(RouteMiddlewareEnum::STANDARD->value)->group(function () {
        Route::get('check-token', 'checkToken');
        Route::post('logout', 'logout');
        Route::post('change-password', 'changePassword');
    });
});

Route::middleware(RouteMiddlewareEnum::STANDARD->value)->group(function () {
    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::withoutMiddleware(RouteMiddlewareEnum::STANDARD->value)->group(function () {
            Route::get('', 'index');
            Route::get('{user}', 'userPosts');
            Route::get('{post}/view', 'view');
        });

        Route::get('my-posts', 'myPosts');
        Route::post('create', 'store');
    });
});
