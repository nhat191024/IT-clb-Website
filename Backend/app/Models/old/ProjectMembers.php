<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasMany(User::class, 'id', 'Member');
    }

    public function project()
    {
        return $this->hasOne(project::class, 'Id', 'Project');
    }
}
