<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projectDetails extends Model
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

    public function project()
    {
        return $this->belongsTo(projectDetails::class, 'projectID', 'id');
    }

    public function leader()
    {
        return $this->belongsTo(user::class, 'leaderID', 'id');
    }

    public function projectMember()
    {
        return $this->belongsToMany(user::class, 'project_member');
    }
}
