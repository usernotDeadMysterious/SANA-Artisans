<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'qualification',
        'specialization',
        'experience',
        'contact',
        'email',
        'address',
        'certification',
        'current_status',
        'cv_path',
        'profile_photo_path',
        'approval_status',
    ];

    protected $casts = [
        'certification' => 'array',
    ];
}