<?php

namespace App\Http\Controllers\Admin;

use App\Parameter;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametersController extends Controller
{
    public function store(Request $request, $id){
       // dd($id);
        $parameter = new Parameter();
        $parameter->type = $request->type;
        $parameter->temperature = $request->temperature;
        $parameter->pressure_low = $request->pressure_low;
        $parameter->pressure_high = $request->pressure_high;
        $parameter->refrigerant = $request->refrigerant;
        $parameter->oil = $request->oil;
        $parameter->save();

        $parameter->syncRefrigerants($request->get('refrigerants'));

        $post = Post::find($id);
        $post->parameter_id = $parameter->id;
        $post->save();

        return json_encode("ok");
    }

    //actualizacion pendiente prueba
    public function update(Request $request, Parameter $parameter)
    {
        $parameter->type = $request->type;
        $parameter->temperature = $request->temperature;
        $parameter->pressure_low = $request->pressure_low;
        $parameter->pressure_high = $request->pressure_high;
        $parameter->refrigerant = $request->refrigerant;
        $parameter->oil = $request->oil;

        $parameter->refrigerant_id = $request->refrigerant_id;
        $parameter->save();
                //$parameter->syncRefrigerants($request->get('refrigerants'));
        return json_encode("ok update");
    }
}
