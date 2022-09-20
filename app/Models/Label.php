<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Label extends Model
{
    use HasFactory;

    /**
     * The users that owns the label.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
