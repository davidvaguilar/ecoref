<?php

namespace App\Http\Controllers\Admin;

use App\Problem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index(){
        $problems = Problem::orderBy('created_at', 'desc')->get();           
        return view('admin.problems.index', compact('problems'));
    }

    public function store(Request $request){
        $data = $request->validate([
          'name' => 'required',
        ]);

        $problem = new Problem();
        $problem->name = $request->get('name');
        $problem->save();
        return redirect()->route('admin.problems.index')
                        ->with('flash', 'El problema de la orden ha sido creada.');
    }

    public function update(Request $request, Problem $problem){
        $data = $request->validate([
          'name' => 'required',
        ]);
        $problem->name = $request->get('name');
        $problem->save();
        return redirect()->route('admin.problems.index')->with('flash', 'Problema se ha actualizado correctamente');
    }

    public function destroy(Problem $problem){
        $problem->delete();
        return back()->with('flash', 'El problema de orden ha sido eliminada.');
    }
}
