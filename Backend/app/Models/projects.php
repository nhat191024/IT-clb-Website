<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{

    protected $fillable = [
        'leaderID',
        'projectID',
        'description',
        'projectSrc',
        'status',
        'show',
        'startDate',
        'endDate',
    ];

    public function projectDetail()
    {
        return $this->hasOne(projectDetails::class, 'projectID', 'id');
    }

    public function type()
    {
        return $this->belongsToMany(types::class, 'project_type');
    }

    public function language()
    {
        return $this->belongsToMany(languages::class, 'project_language');
    }

    public function framework()
    {
        return $this->belongsToMany(frameworks::class, 'project_framework');
    }
}
