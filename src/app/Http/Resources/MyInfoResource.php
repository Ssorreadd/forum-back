<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyInfoResource extends JsonResource
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
            'username' => $this->username,
            'locale' => $this->locale,
            'tz' => $this->tz,
            'created_at' => $this->created_at->setTimezone('+3')->format('H:i d.m.Y'),
        ];
    }
}
