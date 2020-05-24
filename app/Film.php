<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $fillable = [
        'name',
        'year',
        'country',
        'duration',
        'director',
        'description',
        'image',
        'stars',
        'video'
    ];

    public function genres() {
        return $this->belongsToMany('App\Genre', 'film_genre', 'film_id', 'genre_id');
    }

    public function actors() {
        return $this->belongsToMany('App\Actor', 'actor_film', 'film_id', 'actor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
