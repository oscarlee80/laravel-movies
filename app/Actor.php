<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = [];

    public function getNombreCompleto()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function movies ()
    {
        return $this->belongsToMany(Movie::class);
    }

    public function favorite_movie ()
    {
        return $this->belongsTo(Movie::class, 'favorite_movie_id');
    }

    public function episodes ()
    {
        return $this->belongsToMany(Episode::class);
    }
}
