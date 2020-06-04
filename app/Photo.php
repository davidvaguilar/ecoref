<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $guarded = [];  //sacar al proteccion 

    public function setTitleAttribute($title){
        $this->attributes['title'] = mb_strtoupper($title);
    }

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
