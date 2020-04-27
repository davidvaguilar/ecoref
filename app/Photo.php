<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];  //sacar al proteccion 

    protected static function boot(){
        parent::boot();
        static::deleting(function($photo){
            //dd($photo->url);
            //Storage::disk('public')->delete($photo->url);
            unlink(public_path().$photo->url);
            //dd(Storage::delete($photo->url));
        });
    }
}
