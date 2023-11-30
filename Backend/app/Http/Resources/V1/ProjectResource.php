<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\MajorResource;

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
            'Id' => $this->Id,
            'Name' => $this->Name,
            'Image' => $this->Image,
            'StartDate' => $this->StartDate,
            'WorkTime' => $this->WorkTime,
            'EndDate' => $this->EndDate,
            'ProjectSrc' => $this->ProjectSrc,
            'Status' => $this->Status,
            'Description' => $this->Description
        ];
    }
}
