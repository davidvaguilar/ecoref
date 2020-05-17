<?php

namespace App\Http\Controllers\Admin;

use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index(){
        $types = Type::orderBy('created_at', 'desc')->get();        
        return view('admin.types.index', compact('types'));
        //return BookResource::collection(Book::with('ratings')->paginate(25));
    }

    public function store(Request $request){
        $data = $request->validate([
          'name' => 'required',
        ]);

        $type = new Type();
        $type->name = $request->get('name');
        $type->save();
        return redirect()->route('admin.types.index')->with('flash', 'El tipo de orden ha sido creada.');
    }

    public function update(Request $request, Type $type){
      $data = $request->validate([
        'name' => 'required',
      ]);
      $type->name = $request->get('name');
      $type->save();
      return redirect()->route('admin.types.index')->with('flash', 'Tipo actualizado correctamente');
    
      /*if ($request->user()->id !== $book->user_id) {
        return response()->json(['error' => 'You can only edit your own books.'], 403);
      }
      $book->update($request->only(['title', 'description']));
      return new BookResource($book);*/
    }

    public function destroy(Type $type)
    {
      $type->delete();
      return back()->with('flash', 'El tipo de orden ha sido eliminada.');
      //return response()->json(null, 204);
    }
}
