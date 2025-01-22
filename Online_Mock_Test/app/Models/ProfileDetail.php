<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profile_picture',
        'about',
        'education',
        'current_organization',
        'current_position',
        'skills',
        'interests',
        'experience',
        'role',
        'linkedin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
