<?php

namespace App\Http\Resources\Blog;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogRawResource extends JsonResource
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
            'content' => $this->content,
            'user' => $this->whenLoaded('user', fn () => UserResource::make($this->user)),
            'category' => $this->whenLoaded('category', fn () => BlogCategoryResource::make($this->category)),
            'views' => $this->views,
            'created_at' => $this->created_at->setTimezone('+3')->format('H:i d.m.Y'),
            'updated_at' => $this->updated_at->setTimezone('+3')->format('H:i d.m.Y'),
        ];
    }
}
