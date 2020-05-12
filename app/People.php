<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public function emails(){
        return $this->hasMany(Email::class);
    }
}
