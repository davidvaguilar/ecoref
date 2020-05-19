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
        ini_set('memory_limit', '256M');  // Temporalmente aumento de memoria hasta 256
      
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
        }
        return back();*/
 
        /*Image::make($request->file('photo'))
            ->resize(500, 500)
            ->save('img/orders/'.$file_name);  */
        // no sirve   ini_set('post_max_size', '40M');  
        // no sirve  ini_set('upload_max_filesize', '20M');  //Temporalmente  post_max_size = 10M
       
        $post = Post::find($id);
        
        $file = $request->file('photo');
        $image_name = 'ot'.$post->title.'-'.Carbon::now()->format('dmYHis').'.'.$file->getClientOriginalExtension();
        $image = Image::make($file);


        switch ($request->get('type')) {
            case 'PROBLEMA':
                    $image->resize(600, 600);
                break;
            case 'ORDEN':
                    $image->resize(1224, 1584);
                    //$image->resize(1836, 2376);
                break;
        }
        $image->save('img/orders/'.$image_name);

        $photo = new Photo();
        $photo->url = '/img/orders/'.$image_name;
        $photo->title = $request->get('title');
        $photo->type = $request->get('type');
        
        $photo->post_id = $id;
        $photo->save();
      
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
