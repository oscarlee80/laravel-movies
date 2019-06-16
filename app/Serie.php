<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
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

    public function genre ()
    {
        return $this->belongsTo(Genre::class);
    }

    public function seasons ()
    {
        return $this->HasMany(Season::class);
    }
}
