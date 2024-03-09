<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostCategoryResource;
use App\Models\Post\PostCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PostCategoryResource::collection(
            PostCategory::all()
        );
    }
}
