<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\MajorResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id,
            'name' => $this->Name,
            'surname' => $this->Surname,
            'birthday' => $this->Birthday,
            'joinDate' => $this->JoinDate,
            'course' => $this->Course,
            'mail' => $this->Mail,
            'phone' => $this->Phone,
            'username' => $this->Username,
            'active' => $this->Active,
            'socialAccount' => $this->SocialAccount,
            'role' => $this->Role,
            'major' => MajorResource::collection($this->whenLoaded('major')),

        ];
    }
}
