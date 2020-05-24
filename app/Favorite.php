<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $fillable = ['playlist'];
    public $timestamps = false;

    //user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //film
    public function film() {
        return $this->belongsTo(Film::class);
    }
}
