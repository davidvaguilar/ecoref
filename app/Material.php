<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [ 
        'post_id', 'quantity', 'detail', 'user_id'
    ];

    public function setDetailAttribute($detail){
        $this->attributes['detail'] = mb_strtoupper($detail);
    }

}
