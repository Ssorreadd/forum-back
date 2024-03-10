<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\BlogCategoryResource;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogCategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return BlogCategoryResource::collection(
            BlogCategory::all()
        );
    }
}
