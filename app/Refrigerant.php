<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refrigerant extends Model
{
    public function parameters(){
        return $this->belongsToMany(Parameter::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = strtoupper($name);
    }
}
