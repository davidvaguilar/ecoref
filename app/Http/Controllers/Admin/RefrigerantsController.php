<?php

namespace App\Http\Controllers\Admin;

use App\Refrigerant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefrigerantsController extends Controller
{
    public function index(){
        $refrigerants = Refrigerant::all();        
        return view('admin.refrigerants.index', compact('refrigerants'));
    }

    public function store(Request $request){
        $this->validate($request, ['title' => 'required|min:3'] );

        $refrigerant = new Refrigerant();
        $refrigerant->name = $refrigerant->name;

        $refrigerant->save();
        return redirect()->route('admin.refrigerants.index')
                ->with('flash', 'El refrigerante ha sido creada.');;
    }
}
