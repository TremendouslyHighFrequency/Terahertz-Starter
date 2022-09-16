<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Nova\User;
use App\Models\Album;

class Track extends Model
{
    use HasFactory;

    /**
     * The Artists that belong to the Track.
     */
    public function artists()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The Albums that belong to the Track.
     */
    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }


    /**
     * The Remixes that belong to the user / Artist
     */
    public function remixers()
    {
        return $this->belongsToMany(User::class);
    }
}
