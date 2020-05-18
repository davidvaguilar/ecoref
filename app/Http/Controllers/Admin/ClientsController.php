<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Post;
use App\Client;
use App\People;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
       /*$problems = DB::table('posts as p')
        ->select(DB::raw('COUNT(p.id) as cantidad'))
      //  ->whereYear('p.finished_at', $anio)
        ->groupBy(  DB::raw('client_id'), DB::raw('problem_id') )
        ->get()
        ->pluck('cantidad');*/

        $clients = Client::get();
        return view('admin.clients.index', compact('clients'));
    }



    /*public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'adress' => 'required',            
            'city' => 'required',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->title = $request->title;
        $client->adress = $request->adress;
        $client->city = $request->city;
        $client->save();
        $client->code = $client->id;
        $client->save();
        if(isset($request->post_id)){
            $post = Post::find($request->post_id);
            $post->client_id = $client->id;
            $post->save();
        };
        return back();
    }*/

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        $client = new Client();
        $client->name = $request->get('name');
        $client->code = $request->get('code');
        $client->save();
        return redirect()->route('admin.clients.edit', $client);
    }

    public function edit(Client $client){  
        $peoples = People::all();
        return view('admin.clients.edit', compact('client', 'peoples'));
    }
    
    public function update(Request $request, Client $client){
        $data = $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $client->code = $request->get('code');
        $client->name = $request->get('name');
        $client->title = $request->get('title');
        $client->adress = $request->get('adress');
        $client->city = $request->get('city');
        $client->save();

        $client->syncPeoples($request->get('peoples'));

        return redirect()->route('admin.clients.index')->with('flash', 'Local '.$request->get('code').' actualizado correctamente');
    }

    public function destroy(Client $client){
        $client->delete();
        return back()->with('flash', 'El cliente ha sido eliminado.');
    }

}
