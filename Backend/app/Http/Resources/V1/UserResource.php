<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\MajorResource;

class UserResource extends JsonResource
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
            'surname' => $this->Surname,
            'birthday' => $this->Birthday,
            'joinDate' => $this->JoinDate,
            'majorId' => $this->Major,
            'courseId' => $this->Course,
            'mail' => $this->Mail,
            'phone' => $this->Phone,
            'username' => $this->username,
            'active' => $this->Active,
            'socialAccount' => $this->SocialAccount,
            'role' => $this->Role,
            'major' => new MajorResource($this->whenLoaded('major')),
            'course' => new CourseResource($this->whenLoaded('course')),
        ];
    }
}
