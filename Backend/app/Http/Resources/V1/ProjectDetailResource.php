<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectDetailResource extends JsonResource
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
            'leader' => new UserResource($this->whenLoaded('leader')),
            'member' => new UserCollection($this->whenLoaded('projectMember')),
            'description' => $this->description,
            'projectSrc' => $this->projectSrc,
            'status' => $this->status,
            'show' => $this->show,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate
        ];
    }
}
