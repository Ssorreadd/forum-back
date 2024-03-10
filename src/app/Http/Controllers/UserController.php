<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $authUser = $request->user();

        $users = User::where('id', '!=', optional($authUser)->id)->get();

        return UserResource::collection($users);
    }

    public function im(Request $request): UserResource
    {
        return UserResource::make($request->user());
    }
}
