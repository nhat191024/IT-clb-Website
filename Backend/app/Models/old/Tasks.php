<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(project::class, 'project', 'Id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'Id', 'WorkMember');
    }
}
