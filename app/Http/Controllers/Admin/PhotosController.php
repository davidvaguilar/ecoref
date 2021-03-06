<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function store(Request $request){
        ini_set('memory_limit', '256M');  // Temporalmente aumento de memoria
      
        $this->validate($request, [
            'photo' => 'required|image'
        ]); 

       /* $file = $request->file('photo');
        $path = public_path().'/img/posts';
        $fileName = uniqid().$file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
  
        if ($moved) {
          $photo = new Photo();
          $photo->url = '/img/posts/'.$fileName;
          $photo->title = $request->get('title');
          $photo->post_id = $id;
          $photo->save();
        } */
       
        $post = Post::find($request->order);
        
        $file = $request->file('photo');
        $image_name = 'ot'.$post->title.'-'.Carbon::now()->format('dmYHis').'.'.$file->getClientOriginalExtension();

     //   Image::configure(array('driver' => 'imagick'));

        $image = Image::make($request->file('photo'));
       
        switch ($request->get('type')) {
            case 'PROBLEMA':
                    //Ancho , alto
                    $image->resize(600, 650, function($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                break;
            case 'ORDEN':
                    $image->resize(1224, 1584, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });         
                break;
        }
        $image->orientate();
        $image->save('img/orders/'.$image_name);
      
        $photo = new Photo();
        $photo->url = '/img/orders/'.$image_name;
        $photo->title = $request->get('title');
        $photo->type = $request->get('type');
        
        $photo->post_id = $post->id;
        $photo->save();
      
        return redirect()->route('admin.posts.edit', $post);
    }



    public function destroy(Photo $photo){
        $photo->delete();
        return back()->with('flash', 'Foto eliminada');
    }
}
