<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Album;

class Track extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'track_type',
        'explicit',
        'summary',
        'description',
        'lyrics',
        'release_date',
        'price_fiat',
        'price_ergo',
        'itunes_block',
        'google_block',
        'artwork_url',
        'audio_file_url',
        'high_resolution_file_url'
    ];



    /**
     * The Artists that belong to the Track.
     */
    public function users()
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
        return $this->belongsToMany(User::class, 'remixers');
    }
}
