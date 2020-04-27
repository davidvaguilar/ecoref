<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Material;
use App\Problem;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;


class PostsController extends Controller
{
    public function index(){
        //$posts = Post::all();   //$posts = Post::where('user_id', auth()->id())->get();
        //$posts = auth()->user()->posts;
        
        $posts = Post::allowed()->get();
        return view('admin.posts.index', compact('posts'));
    }

   /* public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }*/

    public function create(){
        dd("sdasd");
    }

    public function store(Request $request){
      //dd($request->get('fecha'));
     return json_encode("ok2");
       /* $this->authorize('create', new Post);
        $this->validate($request, ['title' => 'required|min:3']);


        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id()
        ]);
      
        return redirect()->route('admin.posts.edit', $post); */
    }

    public function show($id){
        //dd("sdasd");
        /*$role = auth()->user()->role;
        return view( 'appointments.show', compact('appointment', 'role') );*/
        
        $materials = Material::where('post_id', '=', $id)->get();
      //  $materials = Material::find($id);
//dd( $materials );
        return[
            'materials' => $materials
        ];
       // return "show";
    }

    public function edit(Post $post){
       // dd($post);
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();

        $problems = Problem::all();
        $types = Type::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post', 'problems', 'types'));
        
        /*return view('admin.posts.edit', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post' => $post
        ]);*/
    }
    
    public function update( Post $post, Request $request ){    //Post $post,  StorePostRequest $request
        if( !$request->ajax()) return redirect('/');
      // dd($request);
//dd($post);

       // $post->arrival_at = $request->get('arrival_at');
       // $post->goes_at = $request->get('goes_at');

        $post->type_id = $request->get('type_id');
        $post->type_other = $request->get('type_other');
        $post->model = $request->get('model');
        $post->serie = $request->get('serie');
        $post->problem_id = $request->get('problem_id');
        $post->job = $request->get('job');

        $post->save();

        return json_encode("ok2");
        //validacion
        //dd($request->filled('published_at'));
        /*$this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required'
        ]);*/
        //$this->validatePost($request);

        /*$post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->get('published_at');  //hacia un accesor
        $post->category_id = $request->get('category_id');
        $post->save();*/

        //$post->update($request->except('tags'));
//$this->authorize('update', $post);
//$post->update($request->all());

//$post->syncTags($request->get('tags'));

        /*$tags = collect($request->get('tags'))->map(function($tag){
            return Tag::find($tag)
            ? $tag
            : Tag::create(['name' => $tag])->id;
        });*/

        /*$tags = []; //ES LO MISMO QU ARRIBA
        foreach ($request->get('tags') as $tag){
            $tags[] = Tag::find($tag)
                    ? $tag
                    : Tag::create(['name' => $tag])->id;
        }*/
        //$post->tags()->sync($tags);

//return redirect()->route('admin.posts.edit', $post)->with('flash', 'La publicacion ha sido guardada');
        //return back()->with('flash', 'Tu publicacion ha sido guardada');
    }

    /*public function validatePost($request){
        return $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required'
        ]);
    }*/

    public function report(Post $post){ 
       /* $productos = Producto::join('categorias', 'productos.idcategoria', '=', 'categorias.id')
            ->select('productos.id', 'productos.idcategoria', 'productos.codigo', 'productos.nombre', 'categorias.nombre as nombre_categoria', 'productos.precio_venta', 'productos.stock', 'productos.condicion')
            ->orderBy('productos.nombre', 'desc')->get();*/

      //  $cont = Producto::count();
       // $pdf = \PDF::loadView('pdf.productospdf', ['productos' => $productos, 'cont'=> $cont]);
      //  $pdf->setPaper('A4', 'landscape');
      //  return $pdf->stream('productos.pdf'); //->stream('productos.pdf');
      
        $pdf = \PDF::loadView('pdf.order', ['post'=> $post]);
      //  $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('ordentrabajo-'.$post->id.'.pdf'); 
    }

    public function destroy(Post $post){
        //$post->tags()->detach();
        //$post->photos()->delete();
        /*foreach ($post->photos as $photo){
            $photo->delete();
        }*/
        /*$post->photos->each(function($photo){  //LO MISMO QUE ARRIBA
            $photo->delete();
        });*/
        //$post->photos->each->delete();

        $this->authorize('delete', $post);
        $post->delete();  //Elimina toda las relaciones
        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicación ha sido eliminada.');
    }
}
