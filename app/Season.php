<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = [];

    public function fechaDeEstreno ()
    {
        $fecha = explode(' ', $this->release_date);
        return $fecha[0];
    }

    public function fechaDeFinal ()
    {
        $fecha = explode(' ', $this->end_date);
        return $fecha[0];
    }

    public function serie ()
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes ()
    {
        return $this->HasMany(Episode::class);
    }
}
