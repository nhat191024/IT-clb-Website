<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class majors extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'majorID', 'id');
    }
}
