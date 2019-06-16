<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [];

    public function movies ()
    {
        return $this->hasMany(Movie::class);
    }

    public function series ()
    {
        return $this->hasMany(Serie::class);
    }
}
