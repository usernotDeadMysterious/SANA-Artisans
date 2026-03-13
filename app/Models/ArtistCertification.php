<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtistCertification extends Model
{
    protected $fillable = [
        'artist_id',
        'certification_name',
        'certification_year'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
