<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use App\People;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {

        $clients = Client::all();
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
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->save();
        return redirect()->route('admin.clients.edit', $client);
    }

    public function edit(Client $client){  
        $peoples = People::all();
        return view('admin.clients.edit', compact('client', 'peoples'));
    }

    
    public function update(Request $request, Client $client)
    {
       // dd($request->get('peoples'));
        $data = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'city' => 'required'
        ]);

        $client->code = $request->code;
        $client->name = $request->name;
        $client->title = $request->title;
        $client->adress = $request->adress;
        $client->city = $request->city;
        $client->save();
        $client->syncPeoples($request->get('peoples'));

        return back()->with('flash', 'Datos del cliente actualizados');
    }

}
