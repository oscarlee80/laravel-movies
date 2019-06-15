<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = [];

    public function fechaDeEstreno ()
    {
        $fecha = explode(' ', $this->release_date);
        return $fecha[0];
    }

    public function season ()
    {
        return $this->belongsTo(Season::class);
    }

    public function actors ()
    {
        return $this->hasMany(Actor::class);
    }
}
