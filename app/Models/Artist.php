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
        'trade',
        'district',
        'current_status',
        'cv_path',
        'profile_photo_path',
        'approval_status',
    ];

    public function certifications()
    {
        return $this->hasMany(ArtistCertification::class);
    }
}