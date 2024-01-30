<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'studentID' => $this->studentID,
            'mail' => $this->mail,
            'username' => $this->username,
            'name' => $this->name,
            'avatarPath' => $this->avatarPath,
            'birthday' => $this->birthday,
            'joinDate' => $this->joinDate,
            'major' => new MajorResource($this->whenLoaded('major')),
            'course' => new CourseResource($this->whenLoaded('course')),
            'phone' => $this->phone,
            'active' => $this->active,
            'socialAccount' => $this->socialAccount,
            'role' => $this->role,
        ];
    }
}
