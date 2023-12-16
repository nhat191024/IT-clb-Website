<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'name' => $this->Name,
            'content' => $this->Content,
            'authorId' => $this->Author,
            'view' => $this->View,
            'like' => $this->Like,
            'author' =>new UserResource($this->whenLoaded('member')),
        ];
    }
}
