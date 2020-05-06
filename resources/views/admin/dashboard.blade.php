@extends('admin.layout')

@section('content')
    <!--<h1>Dashboard</h1>
    <p>Usuario autenticado: {{ auth()->user()->name }} </p>-->

    <div class="row">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3>  @foreach ($orders as $order)
                {{ $order->cantidad }}
            @endforeach </h3>
              <p>Nuevas Ordenes</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>   
            </div>
            <a href="#" class="small-box-footer">Mayor información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Mayor información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      
       
      </div>
@stop