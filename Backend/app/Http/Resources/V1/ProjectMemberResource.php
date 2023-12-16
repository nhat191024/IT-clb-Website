<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\MajorResource;

class ProjectMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'ProjectId' => $this->Project,
            'MemberId' => $this->Member,
            'ProjectInfo' => new ProjectResource($this->whenLoaded('project')),
            'MemberInfo' => new UserCollection($this->whenLoaded('user'))
        ];
    }
}
