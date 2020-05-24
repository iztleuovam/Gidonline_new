<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
        'body',
        'created_at',
        'updated_at'
    ];
    //film
    public function film() {
        return $this->belongsTo(Film::class);
    }

    //user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
