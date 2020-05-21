<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{
    public function index(){
        return "no acceder";
    }

    public function store(Request $request){
        $this->validate($request, ['quantity' => 'required']);

        $material = Material::create([
            'post_id' => $request->get('post_id'),
            'quantity' => $request->get('quantity'),
            'detail' => $request->get('detail'),
            'user_id' => auth()->id()
        ]);

    //    dd($request);
        return json_encode("ingreso correcto");
    }

    public function show(Post $post){
        //dd("sdasd");
        /*$role = auth()->user()->role;
        return view( 'appointments.show', compact('appointment', 'role') );*/
        return "show";
    }

    public function desactivar(Request $request){
        $material = Material::findOrFail($request->id);
        $material->delete();
        return json_encode("Material eliminado");
    }

}
