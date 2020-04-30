<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refrigerant extends Model
{
    public function parameters(){
        return $this->belongsToMany(Parameter::class);
    }
}
