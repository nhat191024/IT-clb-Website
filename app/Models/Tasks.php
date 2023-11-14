<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }

    public function member()
    {
        return $this->hasMany(Members::class);
    }
}
