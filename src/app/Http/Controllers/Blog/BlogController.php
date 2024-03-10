<?php

namespace App\Http\Controllers\Blog;

use App\Enums\CursorsEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Blog\BlogRawResource;
use App\Http\Resources\Blog\BlogResource;
use App\Models\Blog\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function index(SearchRequest $request): AnonymousResourceCollection
    {
        $blogs = Blog::query();

        if ($request->has('username')) {
            $user = User::where('username', $request->username)->first();
            if ($user) {
                $blogs->where('user_id', $user->id);
            }
        }

        if ($request->has('category_id')) {
            $blogs->where('category_id', $request->category_id);
        }

        return BlogResource::collection(
            $blogs->with(['category', 'user'])
                ->orderBy($request->search_by ?? 'views', $request->order_type ?? 'desc')
                ->cursorPaginate(CursorsEnum::POST->value)
        );
    }

    public function view(Request $request, Blog $blog): BlogRawResource
    {
        $user = $request->user();

        if (($user && $blog->user_id != $user->id) || empty($user)) {
            $blog->increment('views');
        }

        return BlogRawResource::make($blog->load(['category', 'user']));
    }

    public function myBlogs(Request $request)
    {
        return BlogRawResource::collection(
            $request->user()->posts()
                ->with(['category'])->get()
        );
    }

    public function store(StoreBlogRequest $request): Response
    {
        Blog::create([
            'title' => $request->validated('title'),
            'content' => $request->validated('content'),
            'user_id' => $request->user()->id,
            'category_id' => $request->validated('category_id'),
        ]);

        return response()->noContent();
    }
}
