<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if( auth()->user()->hasRole('Writer') ){
                $clients = Client::groupBy('name')->orderBy('name', 'desc')->get(['name']);
                $users = Role::where('name', 'Writer')->first()->users()->get();
                $posts = Post::allowed()->orderBy('started_at', 'desc')->get();
                return view('admin.posts.index', compact('posts', 'clients', 'users'));
        }

        $anio = date('Y');
        $mes = date('m');

        $orders = DB::table('posts as p')
                ->select(DB::raw("CONCAT(DAY(p.finished_at),'-',MONTHNAME(p.finished_at)) as mes"),
                        DB::raw('DAY(p.finished_at)'),
                        DB::raw('COUNT(p.id) as cantidad'))
                ->whereYear('p.finished_at', $anio)
                ->whereMonth('p.finished_at', $mes)
                ->whereNull('p.deleted_at')
                ->groupBy( DB::raw("CONCAT(DAY(p.finished_at),'-',MONTHNAME(p.finished_at))"), 
                                        DB::raw('DAY(p.finished_at)'))
                ->orderBy(DB::raw('DAY(p.finished_at)'))        
                ->get();

        $orders_dates = $orders->pluck('mes');  
        $orders_quantity = $orders->pluck('cantidad');  

        $types = Post::join('types', 'posts.type_id','=', 'types.id')
                ->select( DB::raw('types.name as label'),
                        DB::raw('COUNT(*) as value'))
                ->whereYear('posts.finished_at', $anio)
                ->groupBy( DB::raw('posts.type_id') )
                ->get();

        $problems = Post::join('problems', 'posts.problem_id','=', 'problems.id')
                ->select( DB::raw('problems.name as label'),
                        DB::raw('COUNT(*) as value'))
                ->whereYear('posts.finished_at', $anio)
                ->groupBy( DB::raw('posts.problem_id') )
                ->get();

        $users = Post::join('users', 'posts.user_id','=', 'users.id')
                ->select( DB::raw('users.name as usuario'),
                        DB::raw('COUNT(*) as cantidad'))
                ->whereYear('posts.finished_at', $anio)
                ->groupBy( DB::raw('posts.user_id') )
                ->get();

        $users_name = $users->pluck('usuario'); 
        $users_quantity = $users->pluck('cantidad'); 

        return view('admin.dashboard', 
                compact('orders_dates', 'orders_quantity', 'types', 'problems', 'users_name', 'users_quantity'));
    }
}
