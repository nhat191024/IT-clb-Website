<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frameworks extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projectFramework(){
        return $this->belongsToMany(projects::class);
    }
}
