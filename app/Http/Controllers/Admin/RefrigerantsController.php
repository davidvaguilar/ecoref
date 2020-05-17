<?php

namespace App\Http\Controllers\Admin;

use App\Refrigerant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RefrigerantsController extends Controller
{
    public function index(){
        $refrigerants = Refrigerant::orderBy('created_at', 'desc')->get();    
        return view('admin.refrigerants.index', compact('refrigerants'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);

        $refrigerant = new Refrigerant();
        $refrigerant->name = $request->get('name');
        $refrigerant->save();
        return redirect()->route('admin.refrigerants.index')
                        ->with('flash', 'El refrigerante ha sido creada.');;
    }

    public function update(Request $request, Refrigerant $refrigerant){
        $data = $request->validate([
          'name' => 'required',
        ]);
        $refrigerant->name = $request->get('name');
        $refrigerant->save();
        return redirect()->route('admin.refrigerants.index')->with('flash', 'Refrigerante se ha actualizado correctamente');
    }

    public function destroy(Refrigerant $refrigerant){
        $refrigerant->delete();
        return back()->with('flash', 'El refrigerante de orden ha sido eliminada.');
    }
}
