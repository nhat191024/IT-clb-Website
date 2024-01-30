<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'studentID',
        'mail',
        'username',
        'password',
        'name',
        'avatarPath',
        'birthday',
        'joinDate',
        'majorID',
        'courseID',
        'phone',
        'active',
        'socialAccount',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function major()
    {
        return $this->belongsTo(majors::class, 'majorID', 'id');
    }

    public function course()
    {
        return $this->belongsTo(courses::class, 'courseID', 'id');
    }

    public function projectDetails()
    {
        return $this->hasMany(projectDetails::class, 'leaderID', 'id');
    }

    public function project()
    {
        return $this->belongsToMany(projects::class);
    }
}
