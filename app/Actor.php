<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //

    protected $fillable = [
        'name',
        'rating'
    ];

    public function films() {
        return $this->belongsToMany('App\Film', 'actor_film', 'actor_id', 'film_id');
    }
}
