<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Track;
use App\Models\User;

class Album extends Model
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
        'catalog_number',
        'release_date',
        'free_download',
        'price_fiat',
        'price_ergo',
        'description',
        'promo_link',
        'publisher_id',
        'album_artwork_url',
        'archive_url'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'release_date' => 'datetime:Y-m-d',
    ];



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
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The Artists that belong to the Album.
     */
    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    /**
     * The credits that belong to the Album.
     */
    public function credits()
    {
        return $this->belongsToMany(User::class, 'credits')->withPivot('reason');;
    }


}
