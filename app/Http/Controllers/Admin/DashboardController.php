<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        $anio = date('Y');

        /*$compras = DB::table('compras as c')
            ->select(DB::raw('MONTHNAME(c.fecha_compra) as mes'),
            DB::raw('YEAR(c.fecha_compra) as anio'),
            DB::raw('SUM(c.total) as total'))
            ->whereYear('c.fecha_compra', $anio)
            ->groupBy( DB::raw('MONTHNAME(c.fecha_compra)'), DB::raw('YEAR(c.fecha_compra)') )
            ->get();*/

        $order = DB::table('posts as p')
            ->select(DB::raw("CONCAT(DAY(p.finished_at),'-',MONTHNAME(p.finished_at)) as mes"),
                    DB::raw('YEAR(p.finished_at) as anio'),
                    DB::raw('COUNT(p.id) as cantidad'))
            ->whereYear('p.finished_at', $anio)
            ->groupBy( DB::raw("CONCAT(DAY(p.finished_at),'-',MONTHNAME(c.finished_at))"), DB::raw('YEAR(p.finished_at)') )
            ->get();

        dd($order);

        /*$ventas = DB::table('ventas as v')
            ->select(DB::raw('MONTHNAME(v.fecha_venta) as mes'),
            DB::raw('YEAR(v.fecha_venta) as anio'),
            DB::raw('SUM(v.total) as total'))
            ->whereYear('v.fecha_venta', $anio)
            ->groupBy( DB::raw('MONTHNAME(v.fecha_venta)'), DB::raw('YEAR(v.fecha_venta)') )
            ->get();*/

        $ventas = DB::table('ventas as v')
            ->select(DB::raw("CONCAT(DAY(v.fecha_venta),'-',MONTHNAME(v.fecha_venta)) as mes"),
                    DB::raw('YEAR(v.fecha_venta) as anio'),
                    DB::raw('SUM(v.total) as total'))
            ->whereYear('v.fecha_venta', $anio)
            ->groupBy( DB::raw("CONCAT(DAY(v.fecha_venta),'-',MONTHNAME(v.fecha_venta))"), DB::raw('YEAR(v.fecha_venta)') )
            ->get();
        return ['compras' => $compras, 'ventas' => $ventas, 'anio' => $anio];             
    }
}
