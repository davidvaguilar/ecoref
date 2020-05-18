<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    public function posts(){
        return $this->hasMany(Post::class); 
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = mb_strtoupper($name);
    }

}
