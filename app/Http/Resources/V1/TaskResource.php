<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'job' => $this->Job,
            'ProjectId' => $this->Project,
            'WorkMemberId' => $this->WorkMember,
            'ProjectInfo' => new ProjectResource($this->whenLoaded('project')),
            'MemberInfo' => new MemberCollection($this->whenLoaded('member'))
        ];
    }
}
