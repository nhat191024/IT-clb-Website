<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{

    protected $fillable = [
        ''
    ];

    public function projectDetail (){
        return $this->hasOne(projectDetails::class, 'projectID', 'id');
    }
}
