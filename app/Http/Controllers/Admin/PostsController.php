<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use App\Category;
use App\Tag;
use Mail;
use App\Material;
use App\Refrigerant;
use App\Problem;
use App\Type;
use App\Parameter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Barryvdh\DomPDF\Facade as PDF;

class PostsController extends Controller
{
    public function index(){
        //$posts = Post::all();   //$posts = Post::where('user_id', auth()->id())->get();
        //$posts = auth()->user()->posts;
        
        $posts = Post::allowed()->orderBy('started_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

   /* public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }*/

    public function store(Request $request){
        $this->authorize('create', new Post);
        $code = $request->get('code');
        $client_id = Client::where('code', $code)->get()->pluck('id')->first();

        if($client_id == NULL){
            return back()->with('flash', 'Cliente no existe');
        }
        $this->validate($request, [
            'title' => 'required|min:3',
            'code' => 'required'
        ]);
        $post = Post::create([
            'title' => $request->get('title'),  
            'client_id' => $client_id,  
            'user_id' => auth()->id(),
            'started_at' => Carbon::now()
        ]);

        $parameter = new Parameter();
        $parameter->save();
        $post->parameter_id = $parameter->id;
        $post->save();
        return redirect()->route('admin.posts.edit', $post);
    }

    /*public function show($id){
        $materials = Material::where('post_id', '=', $id)->get();
        return[
            'materials' => $materials
        ];
    }*/

    public function show($id){
        $post = Post::find($id);
        return[
            'post' => $post
        ];
    }

    public function selectClient(Request $request, $id){
        $post = Post::find($id);
        $client_id = Client::where('code', $request->client_id)->get()->pluck('id')->first();
        if($client_id == NULL){
            return back()->with('flash', 'Cliente no existe');
        }
    
        $post->client_id = $client_id;
        $post->save();
        return back();
    }

    public function edit(Post $post){
        $this->authorize('update', $post);
        $refrigerants = Refrigerant::all();
        $problems = Problem::all();
        $types = Type::all();
        return view('admin.posts.edit', compact('post', 'problems', 'types', 'refrigerants'));
    }

    public function updateTitle( Post $post, Request $request ){
       
        $this->validate($request, [
            'title' => 'required',
        ]);
       
        $post->title = $request->get('title');
        $post->save();
        return back()->with('flash', 'Folio cambiado');
    }

    public function updateFinished( Post $post ){
        $post->finished_at = Carbon::now();
        $post->save();
        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'Orden de trabajo ha finalizado.');
    }

    public function updateStatus( Post $post ){
        $subject = $post->id.$post->client->id.$post->client->title.$post->owner->name.$post->started_at;

        $to = 'ot@ecorefchile.cl';
        $data = ['nombre' => 'Ecoref'];

        $refrigerants = Refrigerant::all();
        $pdf = PDF::loadView('pdf.order', ['post'=> $post, 'refrigerants'=> $refrigerants]);   
        $url = 'pdf/order/ordentrabajo-'.$post->id.'-'.Carbon::now()->format('dmYHis').'.pdf';
        $pdf->save($url);

        Mail::send('emails.work-order', $data, function ($message) use ($pdf, $to, $subject) {
            $message->from('hugo.ortiz@ecorefchile.cl', 'Ecoref Chile');
            $message->to('ot@ecorefchile.cl')->subject($subject);
            $message->attachData($pdf->output(), $subject.'.pdf');
        });

        $post->status = "ENVIADO";
        $post->save();
        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'Orden de trabajo ha finalizado.');
    }
    
    public function update( Post $post, Request $request ){
        if( !$request->ajax()) return redirect('/');
       
        $post->type_id = $request->get('type_id');
        $post->type_other = $request->get('type_other');
        $post->equipment = $request->get('equipment');
        $post->model = $request->get('model');
        $post->serie = $request->get('serie');
        $post->problem_id = $request->get('problem_id');
        $post->job = $request->get('job');

        $post->save();

        return json_encode("ok2");
    
        //dd($request->filled('published_at'));
        //$this->validatePost($request);

        /*$post->title = $request->get('title');
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

  /*  public function update_folio( Post $post, Request $request ){
       
        $post->title = $request->get('title');
        $post->save();

        return back();
    }**/

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
      $refrigerants = Refrigerant::all();
       $pdf = PDF::loadView('pdf.order', ['post'=> $post, 'refrigerants'=> $refrigerants]);    
       // return $pdf->stream('ordentrabajo-'.$post->id.'.pdf'); 
        $pdf->save('pdf/order/'. 'ordentrabajo-'.$post->id.'-'.Carbon::now()->format('dmYHis').'.pdf');
        return $pdf->stream('ordentrabajo-'.$post->id.'-'.Carbon::now()->format('dmYHis').'.pdf'); 
       // $pdf = PDF::loadView('pdf.order', ['post'=> $post]);    
       // return $pdf->stream('ordentrabajo-'.$post->id.'.pdf'); 
       // return $pdf->save('pdf/order/'. 'ordentrabajo-'.$post->id.'.pdf');
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
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicación ha sido eliminada.');
    }

}
