<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    use HasFactory;

    public function member(){
        return $this->hasMany(Members::class);
    }

    public function project()
    {
        return $this->hasMany(Projects::class);
    }
}
