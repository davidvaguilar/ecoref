<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use App\Signature;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function store(Request $request, $id){
                //dd($request->get('client-name'));  // no null
         $base64 = $request->get('base64');
         $path = public_path().'/img/clients/';
         $image = str_replace('data:image/png;base64,', '', $base64);
         $fileData = base64_decode($image);
         $fileName = uniqid().'.png';
        
         $moved = file_put_contents($path.$fileName, $fileData);

    //     dd($path.$fileName);
     //    if( $moved ){
           $signature = new Signature();
           $signature->title = $request->get('signature-title');
           $signature->url = '/img/clients/'.$fileName;
           $signature->save();
 
           $post = Post::find($id);
           $post->signature_id = $signature->id;
           $post->save();
 
           return back();
     //    }
       }
}
