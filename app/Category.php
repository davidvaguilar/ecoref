<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){   //model Bulneir
        return 'url';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    /*public function getNameAttribute($name){    //ACCESOR
        return str_slug($name);
    }*/

    public function setNameAttribute($name){    //MUTADOR
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
}
