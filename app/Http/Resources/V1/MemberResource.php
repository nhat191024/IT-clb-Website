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
            'majorId' => $this->Major,
            'courseId' => $this->Course,
            'mail' => $this->Mail,
            'phone' => $this->Phone,
            'username' => $this->Username,
            'password' => $this->Password,
            'active' => $this->Active,
            'socialAccount' => $this->SocialAccount,
            'role' => $this->Role,
            'major' => new MajorResource($this->whenLoaded('major')),
        ];
    }
}
