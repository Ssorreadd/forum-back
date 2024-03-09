<?php

namespace App\Http\Controllers\Post;

use App\Enums\CursorsEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\Post\PostRawResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(SearchRequest $request): AnonymousResourceCollection
    {
        return PostResource::collection(
            Post::with(['category', 'user'])
                ->orderBy($request->search_by ?? 'views', $request->order_type ?? 'desc')
                ->cursorPaginate(CursorsEnum::POST->value)
        );
    }

    public function userPosts(User $user)
    {

    }

    public function view(Request $request, Post $post): PostRawResource
    {
        $user = $request->user();

        if (($user && $post->user_id != $user->id) || empty($user)) {
            $post->increment('views');
        }

        return PostRawResource::make($post->load(['category', 'user']));
    }

    public function myPosts(Request $request)
    {
        return PostRawResource::collection(
            $request->user()->posts()
                ->with(['category'])->get()
        );
    }

    public function store(StorePostRequest $request): Response
    {
        Post::create([
            'title' => $request->validated('title'),
            'content' => $request->validated('content'),
            'user_id' => $request->user()->id,
            'category_id' => $request->validated('category_id'),
        ]);

        return response()->noContent();
    }
}
