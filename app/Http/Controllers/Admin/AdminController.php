<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anio = date('Y');

        /*$compras = DB::table('compras as c')
            ->select(DB::raw('MONTHNAME(c.fecha_compra) as mes'),
            DB::raw('YEAR(c.fecha_compra) as anio'),
            DB::raw('SUM(c.total) as total'))
            ->whereYear('c.fecha_compra', $anio)
            ->groupBy( DB::raw('MONTHNAME(c.fecha_compra)'), DB::raw('YEAR(c.fecha_compra)') )
            ->get();*/

       /* $order = DB::table('posts as p')
            ->select(DB::raw("CONCAT(DAY(p.started_at),'-',MONTHNAME(p.started_at)) as mes"),
                    DB::raw('YEAR(p.started_at) as anio'),
                    DB::raw('COUNT(p.id) as cantidad'))
            ->whereYear('p.started_at', $anio)
            ->groupBy( DB::raw("CONCAT(DAY(p.started_at),'-',MONTHNAME(p.started_at))"), DB::raw('YEAR(p.started_at)') )
            ->get();*/

        $orders = DB::table('posts as p')
            ->select( DB::raw('COUNT(*) as cantidad') )
            ->get();

        /*$ventas = DB::table('ventas as v')
            ->select(DB::raw("CONCAT(DAY(v.fecha_venta),'-',MONTHNAME(v.fecha_venta)) as mes"),
                    DB::raw('YEAR(v.fecha_venta) as anio'),
                    DB::raw('SUM(v.total) as total'))
            ->whereYear('v.fecha_venta', $anio)
            ->groupBy( DB::raw("CONCAT(DAY(v.fecha_venta),'-',MONTHNAME(v.fecha_venta))"), DB::raw('YEAR(v.fecha_venta)') )
            ->get();*/
        return view('admin.dashboard', compact('orders'));
    }
}
