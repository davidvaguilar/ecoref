<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <!--<link rel="STYLESHEET" href="css/dompdf/print_static.css" type="text/css" />-->
</head>
<style>
  #section_header {
    text-align: center;
  }
  .page {
    border: none;
    padding: 0in;
    margin-right: 0.1in;
    margin-left: 0.1in;
    /*margin: 0.33in 0.33in 0.4in 0.33in; */
    background-color: transparent;
  }
  table.sa_signature_box { 
    margin: 2em auto 2em auto;
  }

  table.sa_signature_box tr td { 
    padding-top: 1.25em;
    vertical-align: top;
  }

  table.change_order_items { 
    font-size: 8pt;
    width: 100%;
    border-collapse: collapse;
    margin-top: 2em;
    margin-bottom: 2em;
  }

  table.change_order_items>tbody { 
    border: 1px solid black;
  }

  table.change_order_items>tbody>tr>th { 
    border-bottom: 1px solid black;
  }

  table.change_order_items>tbody>tr>td { 
    border-right: 1px solid black;
    padding: 0.5em;
  }
  td.change_order_total_col { 
    padding-right: 4pt;
    text-align: right;
  }

  td.change_order_unit_col { 
    padding-left: 2pt;
    text-align: left;
  }

  .even_row td {
  /*  background-color: #F8EEE4;
    border-top: 3px solid #FFFFff;*/
    background-color: #f6f6f6;
    border-bottom: 0.9px solid #ddd;
  }

</style>
<body>

  <!--<div id="section_header"> </div>-->
  
  <div class="page">
    <table style="width: 100%;">
      <tr>
        <td><img src="img/logo.png" width="100px" height="100px"></td>
        <td><h1 style="text-align: center; font-size: 15pt;">REPORTE DE TRABAJO</h1></td>
        <td><h1 style="text-align: right; font-size: 13pt;">Folio: {{ $post->title }}</h1></td>
      </tr>
    </table>
    
    <table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt;">
      <tr>
        <td colspan="2">Nombre del Tecnico: <strong>{{ $post->owner->name }}</strong></td>
      </tr>
      <tr>
        <td>Fecha Llegada: <strong>{{ $post->started_at->format('d/m/Y  H:i') }}</strong></td>
        <td>Fecha Retiro: <strong>{{ $post->finished_at->format('d/m/Y  H:i') }}</strong></td>
      </tr>
    </table>

    <!--<table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black;">
      <tr>
        <td>Vehiculo: <strong>Franklin</strong></td>
        <td>Kilometraje Inicio: <strong>B</strong></td>
        <td>Kilometraje Termino: <strong>1160 Cu. Ft.</strong></td>
      </tr>
    </table>-->
    <br>
    <table style="width: 100%;">
      <thead>
        <tr>
          <th colspan="3">IDENTIFICACION CLIENTE</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt;">
        <tr>
          <td>Empresa: <strong>{{ isset($post->client->id) ? $post->client->name : '' }}</strong></td>          
          <td>Id Local: <strong>{{ isset($post->client->id) ? $post->client->code : '' }}</strong></td>
          <td>Local: <strong>{{ isset($post->client->id) ? $post->client->title : '' }}</strong></td>
        </tr>
        <tr>
          <td colspan="2">Dirección: <strong>{{ isset($post->client->id) ? $post->client->adress : '' }}</strong></td>
          <td>Ciudad: <strong>{{ isset($post->client->id) ? $post->client->city : '' }}</strong></td>
        </tr>
      </tbody>
    </table>

    <table style="width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt;">
      <tr>
        <td>Tipo de Orden: <strong>{{ isset($post->type->id) ? $post->type->name : '' }}</strong></td>
      </tr>
    </table>

    <br>
    <table style="width: 100%; ">
      <thead>
        <tr>
          <th colspan="3">IDENTIFICACION DEL PROBLEMA</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt;">
        <tr>
          <td>Equipo Intervenido: <strong>{{ $post->equipment }}</strong></td>
          <td>Modelo: <strong>{{ $post->model }}</strong></td>
          <td>N° Serie: <strong>{{ $post->serie }}</strong></td>
        </tr>
        <tr>
          <td colspan="3">Problema: <strong>{{ isset($post->problem->id) ? $post->problem->name : '' }}</strong></td>
        </tr>
        <tr>
          <td colspan="3">Trabajo Realizado: <strong>{{ $post->job }}</strong></td>
        </tr>
      </tbody>
    </table>

    <!--<h4>PARAMETROS/MEDICIONES/NIVELES</h4>-->
    <br>
    <table style="width: 100%;">
      <thead>
        <tr>
          <th colspan="2">PARAMETROS/MEDICIONES/NIVELES {{ isset($post->parameter->id) ? $post->parameter->type.' TEMPERATURA' : '' }}</th>
        </tr>
      </thead>
      <tbody style="border-top: 1px solid black; border-bottom: 1px solid black; font-size: 10pt;">
        <tr>
          <td>Temperatura: <strong>{{ isset($post->parameter->id) ? $post->parameter->temperature.' CUMPLE' : '' }} </strong></td>
          <td>Refrigerante: <strong>
            @if( isset($post->parameter->refrigerant_id) ) 
                @foreach ($refrigerants as $refrigerant)
                    @if( $post->parameter->refrigerant_id == $refrigerant->id ) 
                      {{ $refrigerant->name }}
                    @endif
                @endforeach   
            @else 
                {{ '' }}
            @endif   
          </strong></td>
        </tr>
        <tr>
          <td>Presion Baja: <strong>{{ isset($post->parameter->id) ? $post->parameter->pressure_low : '' }}</strong></td>
          <td>Presion Alta: <strong>{{ isset($post->parameter->id) ? $post->parameter->pressure_high : '' }}</strong></td>
        </tr>
        <tr>
          <td>Refrigerante: <strong>{{ isset($post->parameter->id) ? $post->parameter->refrigerant : '' }}</strong></td>
          <td>Aceite: <strong>{{ isset($post->parameter->id) ? $post->parameter->oil : '' }}</strong></td>
        </tr>
      </tbody>
    </table>

    <table style="font-size: 10pt;
            width: 100%;
            border-collapse: collapse;
            margin-top: 2em;
            margin-bottom: 2em;">
      <thead style="font-size: 10pt;">
        <tr>
          <th style="width:20%;">CANTIDAD</th>
          <th>DETALLE DE MATERIALES</th>
        </tr>
      </thead>
      <tbody style="text-align: center; border: 1px solid black;">
        @if ($post->materials->count())
          @foreach ($post->materials as $material)
              <tr class="even_row">
                <td style="border-right: 1px solid black; padding: 0.3em;">{{ $material->quantity }}</td>
                <td style="border-right: 1px solid black; padding: 0.3em;">{{ $material->detail }}</td>
              </tr>        
            @endforeach
        @endif

        <!--<tr class="even_row">
          <td style="text-align: center">1</td>
          <td>Sprockets (13 tooth)</td>
          <td style="text-align: center">50</td>
          <td style="text-align: right; border-right-style: none;">$10.00</td>
          <td class="change_order_unit_col" style="border-left-style: none;">Ea.</td>
          <td class="change_order_total_col">$5,000.00</td>
        </tr>-->

        <!--<tr class="odd_row">
          <td style="text-align: center">4</td>
          <td>Leaf springs (13 N/m)</td>
          <td style="text-align: center">6</td>
          <td style="text-align: right; border-right-style: none;">$125.00</td>
          <td class="change_order_unit_col" style="border-left-style: none;">Ea.</td>
          <td class="change_order_total_col">$750.00</td>
        </tr>-->
      </tbody>
  
      <tr>
        <td colspan="2" style="font-size: 10pt;">Observación: <strong>{{ $post->observation }}</strong></td>
      </tr>
    </table>

    <table style="width:100%; text-align: center; border: 1px solid #000;">
      <tbody>
        <tr>
          <td style="width:50%;"><img src="{{ isset($post->owner->url) ? substr($post->owner->url, 1) : '' }}" width="150"> </td>
          <td><img src="{{ isset($post->signature->id) ? substr($post->signature->url, 1) : '' }}" width="150"> </td>
        </tr>
        <tr>
          <td>{{ $post->owner->name }}</td>
          <td>{{ isset($post->signature->id) ? $post->signature->title : '' }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  @if ($post->photos->count())
    <div style="page-break-after:always;"></div>
    <table style="text-align: center; border: 1px solid #000;">
      <tbody>
        <tr>
          @foreach ($post->photos as $photo)
            @if ($loop->iteration == 3 || $loop->iteration == 5 || $loop->iteration == 7)
              </tr>
              <tr>
            @endif
            <td>
              <img src="{{ substr($photo->url, 1) }}" height="250px" width="50%">  
              <br>
              {{ $photo->title }}              
            </td>    
          @endforeach
        </tr>  
      </tbody>
    </table>
  @endif


</body>
</html>