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
        return $this->hasMany(People::class);
    }
}
