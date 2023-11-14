<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    public function major()
    {
        return $this->belongsTo(Majors::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function project()
    {
        return $this->belongsToMany(Projects::class);
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
