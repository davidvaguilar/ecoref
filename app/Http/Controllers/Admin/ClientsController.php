<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function store(Request $request){
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
    }
}
