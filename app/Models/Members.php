<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Name',
        'Surname',
        'Birthday',
        'JoinDate',
        'Major',
        'Course',
        'Mail',
        'Phone',
        'Avatar',
        'Username',
        'Password',
        'Active',
        'SocialAccount',
        'Role',
    ];

    public function major()
    {
        return $this->belongsTo(Majors::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function projectMembers()
    {
        return $this->belongsToMany(ProjectMembers::class);
    }

    public function task()
    {
        return $this->hasMany(Tasks::class);
    }

    public function blog()
    {
        return $this->hasMany(Blogs::class);
    }
}
