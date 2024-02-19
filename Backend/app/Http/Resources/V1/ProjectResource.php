<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'type' => new TypeCollection($this->whenLoaded('type')),
            'language' => new LanguageCollection($this->whenLoaded('language')),
            'framework' => new FrameworkCollection($this->whenLoaded('framework')),
            'thumbnail' => $this->thumbnailPath,
            'projectDetail' => new ProjectDetailResource($this->whenLoaded('projectDetail'))
        ];
    }
}
