<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Name',
        'Leader',
        'StartDate',
        'EndDate',
        'ProjectSrc',
        'Status'
    ];

    public function projectMembers()
    {
        return $this->hasOne(ProjectMembers::class);
    }

    public function task()
    {
        return $this->hasMany(Tasks::class);
    }
}
