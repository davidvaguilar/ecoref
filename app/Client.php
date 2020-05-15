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

    public function syncPeoples($peoples){
        $peopleIds = collect($peoples)->map(function($people){
            return People::find($people)
            ? $people
            : People::create(['email' => $people])->id;
        });

        return $this->peoples()->sync($peopleIds);
    }

}
