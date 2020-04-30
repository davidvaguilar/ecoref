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
          <td colspan="3">REPORTE DE TRABAJO</td>
          <td>FOLIO N°<br>{{ $post->id }}</td>
        </tr>
        <tr>
          <td width="120px">FECHA LLEGADA<br>{{ $post->started_at }}</td>
          <td width="120px">HORA LLEGADA<br>{{ $post->started_at }}</td>
          <td width="120px">HORA RETIRO<br>{{ $post->finished_at }}</td>
          <td  width="120px">TECNICO RESPONSABLE</td> <!-- rowspan="2"-->
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
    <table class="table table-bordered">
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
          <th width="50%">PARAMETROS/MEDICIONES/NIVELES MT°</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>

            <table class="table" >
              <tbody>
                <tr>
                  <td width="25%">TEMPERATURA</td>
                  <td width="25%">PRESIONES</td>                  
                  <td width="50%">REFRIGERANTE</td>
                </tr>
                <tr>
                  <td rowspan="2">SI CUMPLE</td>    
                  <td>ALTA: 200</td>      
                  <td rowspan="2">R</td>        
                </tr>
                <tr>
                  <td>BAJA: 200</td>            
                </tr>
                <tr>
                  <td colspan="3">REFRIGERANTE: asdasd adas das </td>            
                </tr>
                <tr>
                  <td colspan="3">ACEITE: </td>            
                </tr>
              </tbody>
            </table>
            
          </td>
          <td>

            <table class="table">
              <tbody>
                <tr>
                  <td width="25%">TEMPERATURA</td>
                  <td width="25%">PRESIONES</td>                  
                  <td width="50%">REFRIGERANTE</td>
                </tr>
                <tr>
                  <td rowspan="2">SI CUMPLE</td>    
                  <td>ALTA: 200</td>      
                  <td rowspan="2">R</td>        
                </tr>
                <tr>
                  <td>BAJA: 200</td>            
                </tr>
                <tr>
                  <td colspan="3">REFRIGERANTE: asdasd adas das </td>            
                </tr>
                <tr>
                  <td colspan="3">ACEITE: </td>            
                </tr>
              </tbody>
            </table> 
          </td>
        </tr>
      </tbody>
    </table>
    
    <h5>MATERIALES</h5>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>CANTIDAD</th>
          <th>DETALLE</th>
          <th>VALORIZADO</th>
        </tr>
      </thead>
      <tbody>
      @if ($post->materials->count())
        @foreach ($post->materials as $material)
        <tr>
          <td>{{ $material->quantity }}</td>
          <td>{{ $material->detail }}</td>
          <td>{{ $material->price }}</td>
        </tr>        
        @endforeach
      @endif
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
          <td width="50%"></td>
          <td width="50%"><img src="{{ isset($post->signature->id) ? substr($post->signature->url, 1) : '' }}">  </td>
        </tr>
        <tr>
          <td>FIRMA TECNICO</td>
          <td>{{ isset($post->signature->id) ? $post->signature->title : '' }}</td>
        </tr>
      </tbody>
    </table>


    @if ($post->photos->count())
      <table class="text-center">
        <tbody>
        <tr>
          @foreach ($post->photos as $photo)
            @if ($loop->iteration == 3 )
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
