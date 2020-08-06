<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use App\Category;
use App\Tag;
use App\Record;
use App\User;
use Mail;
use App\Material;
use App\Refrigerant;
use App\Problem;
use App\Type;
use App\Parameter;
use Carbon\Carbon;
use App\Mail\WorkOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class PostsController extends Controller
{
    public function index(){
        //$posts = Post::all();   //$posts = Post::where('user_id', auth()->id())->get();
        //$posts = auth()->user()->posts;

        //$clients = Client::distinct()->get(['name']);
        $clients = Client::groupBy('name')->orderBy('name', 'desc')->get(['name']);
  //      $users = User::all();
        $users = Role::where('name', 'Writer')->first()->users()->get();
     
        $posts = Post::allowed()->orderBy('id', 'desc')->orderBy('started_at', 'desc')->get();

        return view('admin.posts.index', compact('posts', 'clients', 'users'));
      // $id = 5;  //, ['id'=>$id]
        //return redirect()->route('admin.posts.index')->with('posts', 'clients', 'users');
    }

    public function store(Request $request){ 
        $this->authorize('create', new Post);
   
        $this->validate($request, [
            'title' => 'required|unique:posts',
        ],[
            'title.unique' => 'El folio '.$request->get('title').' ya ha sido registrado anteriormente'
        ]);
        

        $code = $request->get('code');
        $name = $request->get('name');
        $client_id = Client::where('code', $code)
                            ->where('name', $name)
                            ->get()
                            ->pluck('id')
                            ->first();
                            
        if($client_id == NULL){
            return back()->with('flash', 'Cliente no existe');
        } 
        

        $user = $request->get('user');
        if( $user == NULL ){
            $this->validate($request, [
                'title' => 'required|min:3',
                'code' => 'required'
            ]);
            $post = Post::create([
                'title' => $request->get('title'),  
                'client_id' => $client_id,  
                'user_id' => auth()->id(),
            ]);
            /*'started_at' => Carbon::now(),
            'finished_at' => Carbon::now(),*/
        } else {
            $this->validate($request, [
                'title' => 'required|min:3',
                'code' => 'required',
                'user' => 'required'
            ]);
            $post = Post::create([
                'title' => $request->get('title'),  
                'client_id' => $client_id,  
                'user_id' => $user,                
            ]);
            /*'started_at' => Carbon::now(),
                'finished_at' => Carbon::now(),*/
        }
   
        $parameter = new Parameter();
        $parameter->save();
        $post->parameter_id = $parameter->id;
        $post->save(); 
        if( $user == NULL ){
            return redirect()->route('admin.posts.edit', $post);
        } else {
            return back()->with('code', $post->id);

// https://api.whatsapp.com/send?phone={{ $post->owner->phone }}&text=OT%20{{ $post->title }}%20Tecnico%20{{ str_replace(" ","%20",$post->owner->name) }}%20Cliente%20{{ str_replace(" ","%20",$post->client->name) }}%20Local%20{{ str_replace(" ","%20",$post->client->title) }}
        //    $url = "https://api.whatsapp.com/send?phone=56976400180&text=OT%201234%20Tecnico%20Hugo%20Cliente%20Unimarc%20Local%20bilbao";
            //return redirect()->away('https://www.google.com');
            //return Redirect::to('http://www.google.com');
           // return redirect()->to($url);
        }
    }

    public function show($id){
        $refrigerants = Refrigerant::all();
        $post = Post::with(['problem', 'type', 'parameter', 'owner', 'client', 'materials'])
                    ->where('id', $id)->get();
      
        return[
            'post' => $post,
            'refrigerants' => $refrigerants
        ];
    }

    public function view($id)
    {
        $post = Post::with(['owner', 'client'])
                        ->where('id', $id)->get();
        return[
            'post' => $post,
        ];
    }

    public function selectClient(Request $request, $id){
        $post = Post::find($id);
        $code = $request->get('code');
        $name = $request->get('name');
        $client_id = Client::where('code', $code)
                            ->where('name', $name)
                            ->get()
                            ->pluck('id')
                            ->first();
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
       // $clients = Client::distinct()->get(['name']);
       
        $clients = Client::groupBy('name')->orderBy('name', 'desc')->get(['name']);
        return view('admin.posts.edit', compact('post', 'problems', 'types', 'refrigerants', 'clients'));
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
        /*$post->finished_at = Carbon::now();
        $post->save();*/

        $refrigerants = Refrigerant::all();
        $pdf = PDF::loadView('pdf.order', ['post'=> $post, 'refrigerants'=> $refrigerants]);   
        $url = 'pdf/order/OT'.$post->title.'-'.$post->client->code.'-EcorefChile-'.Carbon::now()->format('d-m-Y-H-i').'.pdf';
        $pdf->save($url);

        $record = new Record;
        $record->post_id = $post->id;
        $record->url = $url;
        $record->save();

        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'Orden de trabajo ha finalizado sin firma del cliente.');
    }

    public function updateStatus( Post $post ){
        $subject = 'OT'.$post->title.'-'.$post->client->code.'-EcorefChile-'.$post->started_at->format('d-m-Y-H-i');
        
        $data = ['email' => config('app.name', 'Laravel')];
        $file = url($post->records->last()->url);

        $to = [['email' => 'ot@ecorefchile.cl', 'name' => 'Hugo Ortiz']];   
       // $bcc = [['email' => 'test-sk3r4anwl@srv1.mail-tester.com', 'name' => 'mail-tester']]; 
        $cc = $post->client->peoples->pluck('email')->toArray();     //FUNCIONA solo el GENERICO PARTICULAR
       // ->bcc($bcc)
        Mail::to($to)->cc($cc)->send(new WorkOrder($post, $subject, $file));

        $post->status = "ENVIADO";
        $post->save();
        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'Orden de trabajo '.$post->title.' ha finalizado.');
    }

    public function updateReturn( Post $post ){
        $post->status = "PENDIENTE";
        $post->save();
        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'Orden de trabajo '.$post->title.' ha sido devuelto al Tecnico.');
    }

    
    
    public function update( Post $post, Request $request ){
        if( !$request->ajax()) return redirect('/');
       
        $post->started_at = $request->get('started_at');
        $post->finished_at = $request->get('finished_at');
       // dd($post->finished_at);
        $post->type_id = $request->get('type_id');
        $post->type_other = $request->get('type_other');
        $post->equipment = $request->get('equipment');
        $post->model = $request->get('model');
        $post->serie = $request->get('serie');
        $post->problem_id = $request->get('problem_id');
        $post->job = $request->get('job');

        $post->save();
        return json_encode("ok");
    }
    
    public function showMaterial(Post $post){ 
        return json_encode($post->materials);
    }

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
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La OT ha sido eliminada.');
    }

}
