<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user' => $this->whenLoaded('user', fn () => UserResource::make($this->user)),
            'category' => $this->whenLoaded('category', fn () => PostCategoryResource::make($this->category)),
            'views' => $this->views,
            'created_at' => $this->created_at,
        ];
    }
}
