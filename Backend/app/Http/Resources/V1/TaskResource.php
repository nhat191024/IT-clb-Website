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
            'Task' => $this->Task,
            'Status' => $this->Status,
            'ProjectId' => $this->Project,
            'WorkMemberId' => $this->WorkMember,
            'ProjectInfo' => new ProjectResource($this->whenLoaded('project')),
            'MemberInfo' => new UserCollection($this->whenLoaded('member'))
        ];
    }
}
