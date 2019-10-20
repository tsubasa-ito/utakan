<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['user_id', 'image', 'artist_name', 'song_name', 'comment'];
}

