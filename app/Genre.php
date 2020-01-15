<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model{
    function series() {
        return $this->belongsToMany(Serie::class);
    }

}
