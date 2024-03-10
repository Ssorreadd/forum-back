<?php

use App\Enums\RouteMiddlewareEnum;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\UserController;
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
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->withoutMiddleware(RouteMiddlewareEnum::STANDARD->value);
        Route::get('im', 'im');
    });
    Route::controller(BlogController::class)->prefix('blogs')->group(function () {
        Route::withoutMiddleware(RouteMiddlewareEnum::STANDARD->value)->group(function () {
            Route::get('', 'index');
            Route::get('{user}', 'userBlogs');
            Route::get('{blog}/view', 'view');
        });

        Route::get('my-blogs', 'myBlogs');
        Route::post('create', 'store');
    });

    Route::controller(BlogCategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->withoutMiddleware(RouteMiddlewareEnum::STANDARD->value);
    });
});
