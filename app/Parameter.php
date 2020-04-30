<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public function refrigerants(){ 
        return $this->belongsToMany(Refrigerant::class);
    }

    public function syncRefrigerants($refrigerants){
        $refrigerantIds = collect($refrigerants)->map(function($refrigerant){
            return Refrigerant::find($refrigerant)
            ? $refrigerant
            : refrigerant::create(['name' => $refrigerant])->id;
        });

        return $this->refrigerants()->sync($refrigerantIds);
    }
}
