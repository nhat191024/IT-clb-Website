<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types extends Model
{
    protected $fillable = [];

    public function projectType(){
        return $this->belongsToMany(projects::class);
    }
}
