<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['track_id', 'artist_name', 'artwork_url100', 'track_name', 'kasi', 'comment'];
}

