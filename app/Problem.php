<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{    
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = strtoupper($name);
    }

}
