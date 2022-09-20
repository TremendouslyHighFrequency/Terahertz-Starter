<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \App\Models\Album;
use App\Models\Label;
use App\Models\Track;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];


    /**
     * The tracks that belong to the user / Artist.
     */
    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    /**
     * The Albums that belong to the user / Artist.
     */
    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    /**
     * The Albums that belong to the user / Artist.
     */
    public function albumsPublished()
    {
        return $this->belongsToMany(Album::class, 'publisher_id', 'id');
    }


    /**
     * The Label that belong to the user / Artist.
     */
    public function labels()
    {
        return $this->hasMany(Label::class);
    }

    /**
     * The Credits that belong to the user / Artist from Albums
     */
    public function credits()
    {
        return $this->belongsToMany(Album::class, 'credits')->withPivot('reason');
    }

    /**
     * The Remixes that belong to the user / Artist
     */
    public function remixes()
    {
        return $this->belongsToMany(Track::class);
    }

    
}
