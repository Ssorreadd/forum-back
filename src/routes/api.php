<?php

use App\Enums\RouteMiddlewareEnum;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Post\PostCategoryController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('registration', 'registration');

    Route::middleware(RouteMiddlewareEnum::STANDARD->value)->group(function () {
        //        Route::get('check-token', 'checkToken');
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

    Route::controller(PostCategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->withoutMiddleware(RouteMiddlewareEnum::STANDARD->value);
    });
});
