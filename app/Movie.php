<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    
    public function fechaDeEstreno()
    {
        $fecha = explode(' ', $this->release_date);
        return $fecha[0];
    }

    public function genre () 
    {
        return $this->belongsTo(Genre::class);
    }

    public function actors () {
        return $this->belongsToMany(Actor::class);
    }

    public function favorite_movie ()
    {
        return $this->hasOne(Movie::class, 'favorite_movie_id');
    }
}
