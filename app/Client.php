<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function peoples(){
        return $this->belongsToMany(People::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] = mb_strtoupper($name);
    }

    public function setTitleAttribute($title){
        $this->attributes['title'] = mb_strtoupper($title);
    }

    public function setAdressAttribute($adress){
        $this->attributes['adress'] = mb_strtoupper($adress);
    }

    public function setCityAttribute($city){
        $this->attributes['city'] = mb_strtoupper($city);
    }

    public function syncPeoples($peoples){
        $peopleIds = collect($peoples)->map(function($people){
            return People::find($people)
            ? $people
            : People::create(['email' => $people])->id;
        });

        return $this->peoples()->sync($peopleIds);
    }

}
