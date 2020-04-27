<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
   /* public function store(Post $post){
        $this->validate(request(), [
            'photo' => 'required|image|max:2048'   //|dimensions:min_height
        ]);
        $photo = request()->file('photo');

        $photoStore = $photo->store('posts'); 
        $post->photos()->create([
            'url' => '/img/'.$photoStore,
        ]);
    }*/

    public function store(Request $request, $id){
        //dd($id);
        $file = $request->file('photo');
        $path = public_path().'/img/posts';
        $fileName = uniqid().$file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
  
        // crear 1 registro en la tabla product_image
        if ($moved) {
          $photo = new Photo();
          $photo->url = '/img/posts/'.$fileName;
          $photo->title = $request->get('title');
          $photo->post_id = $id;
          $photo->save();
        }
        return back();
      }



    public function destroy(Photo $photo){
        $photo->delete();

        /*$photoPath = str_replace('storage', 'public', $photo->url);
        Storage::delete($photoPath);*/
        //dd($photoPath);
        
        //Storage::disk('public')->delete($photo->url);
        return back()->with('flash', 'Foto eliminada');
    }
}
