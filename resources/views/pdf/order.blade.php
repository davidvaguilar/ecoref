<!DOCTYPE html>
<html lang="es">
<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body style="font-size:11px;">
  <div class="container">
            
    <table class="table table-bordered text-center">
      <tbody>
        <tr>
          <td rowspan="2" width="110px"><img src="img/logo.png"></td>
          <td colspan="2">REPORTE DE TRABAJO</td>
          <td>FOLIO N°<br>{{ $post->id }}</td>
        </tr>
        <tr>
          <td width="120px">FECHA LLEGADA<br>{{ $post->started_at }}</td>
          <td width="120px">FECHA RETIRO<br>{{ $post->started_at }}</td>
          <td  width="120px">TECNICO RESPONSABLE<br>Cod. {{ $post->owner->id }}</td>
        </tr>
      <!-- <tr>
          <td>VEHICULO/PATENTE</td>
          <td>KM INICIO</td>          
          <td>KM TERMINO</td>
        </tr>-->
      </tbody>
    </table>
    <h5>IDENTIFICACION CLIENTE</h5>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="50%">EMPRESA: {{ isset($post->client->id) ? $post->client->name : '' }}</td>
          <td width="50%">LOCAL: {{ isset($post->client->id) ? $post->client->title : '' }}</td>
        </tr>
        <tr>
          <td>DIRECCION: {{ $post->client->adress }}</td>
          <td>CIUDAD: {{ $post->client->city }}</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="100%">TIPO DE ORDEN: {{ $post->type->name }}</td>
        </tr>
      </tbody>
    </table>
    <h5>IDENTIFICACION DE PROBLEMAS</h5>
    <table class="table table-bordered" width="60%">
      <tbody>
        <tr>
          <td width="60%">EQUIPO INTERVENIDO : {{ $post->equipment }}</td>
          <td width="20%">MODELO: {{ $post->model }}</td>
          <td width="20%">N° SERIE: {{ $post->serie }}</td>
        </tr>
        <tr>
          <td colspan="3">PROBLEMA: {{ $post->problem->name }}</td>
        </tr>
        <tr>
          <td colspan="3">TRABAJO REALIZADO: {{ $post->job }}</td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th width="50%">PARAMETROS/MEDICIONES/NIVELES BT°</th>
          <th width="50%">MATERIALES</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>

            <table class="table ">
              <tbody>
                <tr>
                  <td width="25%">TEMPERATURA</td>
                  <td width="25%">PRESIONES</td>                  
                  <td width="50%">REFRIGERANTE</td>
                </tr>
                <tr>
                  <td rowspan="2">{{ $post->parameter->temperature }} CUMPLE</td>    
                  <td>ALTA: {{ $post->parameter->pressure_high }}</td>      
                  <td rowspan="2" class="text-center">@if( isset($post->parameter->refrigerant_id) ) 
                                    @foreach ($refrigerants as $refrigerant)
                                        @if( $post->parameter->refrigerant_id == $refrigerant->id ) 
                                           {{ $refrigerant->name }}
                                        @endif
                                    @endforeach   
                                @else 
                                    {{ '' }}
                                @endif </td>        
                </tr>
                <tr>
                  <td>BAJA: {{ $post->parameter->pressure_low }}</td>            
                </tr>
                <tr>
                  <td colspan="3">REFRIGERANTE: {{ $post->parameter->refrigerant }} </td>            
                </tr>
                <tr>
                  <td colspan="3">ACEITE: {{ $post->parameter->oil }}</td>            
                </tr>
              </tbody>
            </table>
            
          </td>
          <td>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>DETALLE</th>
                </tr>
              </thead>
              <tbody>
              @if ($post->materials->count())
                @foreach ($post->materials as $material)
                <tr>
                  <td>{{ $material->quantity }}</td>
                  <td>{{ $material->detail }}</td>
                </tr>        
                @endforeach
              @endif
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
    
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="100%">OBSERVACIONES: {{ $post->observation }}</td>
        </tr>
      </tbody>
    </table>
   
    <table class=" text-center" style="width:100%;">
      <tbody>
        <tr>
          <td width="50%"><img src="{{ isset($post->owner->url) ? substr($post->owner->url, 1) : '' }}" width="150"> </td>
          <td width="50%"><img src="{{ isset($post->signature->id) ? substr($post->signature->url, 1) : '' }}" width="150"> </td>
        </tr>
        <tr>
          <td>{{ $post->owner->name }}</td>
          <td>{{ isset($post->signature->id) ? $post->signature->title : '' }}</td>
        </tr>
      </tbody>
    </table>

    <div style="page-break-after:always;"></div>

    

    @if ($post->photos->count())
     
      <table class="text-center">
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

  </div>

</body>
</html>
