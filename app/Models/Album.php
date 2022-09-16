<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Track;
use App\Nova\User;

class Album extends Model
{
    use HasFactory;

    /**
     * The Tracks that belong to the Album.
     */
    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    /**
     * The Artists that belong to the Album.
     */
    public function artists()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The credits that belong to the Album.
     */
    public function credits()
    {
        return $this->belongsToMany(User::class)->withPivot('reason');;
    }


}
