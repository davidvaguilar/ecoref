@extends('admin.layout')

@section('header')
    <h1>
        Orden de Trabajo Folio N° {{ $post->title }}
        <!-- <small>Crear publicación</small>-->
    </h1>
    <ol class="breadcrumb">
    <li>
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> Inicio
        </a>
    </li>
    <li class="active">
        <a href="{{ route('admin.posts.index') }}">
            <i class="fa fa-list"></i> Trabajos
        </a>
    </li>
    <li class="active">Crear</li>
    </ol>
@stop

@section('content')
<div class="row">
    @if ($post->photos->count())
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @foreach ($post->photos as $photo)
                            <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-xs" style="position:absolute">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <img src="{{ url($photo->url) }}" class="img-responsive" width="100px"  >
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs nav-justified">
            <li id="li_order" class="active"><a href="#tab_order" data-toggle="tab">ANTECEDENTES</a></li>
            <li id="li_parameter"><a href="#tab_parameter" data-toggle="tab">MEDICIONES</a></li>
            <li id="li_material" ><a href="#tab_material" data-toggle="tab">MATERIALES</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_order">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="arrival_date_at" class="col-sm-2 control-label">Fecha</label>
                        <div class="col-sm-2">
                            <input name="arrival_date_at"  
                                    type="text" 
                                    class="form-control pull-right datepicker" 
                                    value="{{ old('arrival_at', $post->arrival_at ? $post->arrival_at->format('d/m/Y') : null) }}">
                        </div>
                        <label for="arrival_hour_at" class="col-sm-2 control-label">Hora Llegada</label>
                        <div class="col-sm-2">
                            <input name="arrival_hour_at" 
                                    type="text" 
                                    class="form-control timepicker"
                                    value="{{ old('arrival_at', $post->arrival_at ? $post->arrival_at->format('H:m') : null) }}">   
                        </div>
                        <label for="goes_hour_at" class="col-sm-2 control-label">Hora Retiro</label>
                        <div class="col-sm-2">
                            <input name="goes_hour_at" 
                                    type="text" 
                                    class="form-control timepicker"
                                    value="{{ old('goes_at', $post->goes_at ? $post->goes_at->format('H:m') : null) }}"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tecnico Responsable</label>
                        <div class="col-sm-7">
                            <input name="tecnico" type="text" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <button id="photo-button" type="button" class="btn btn-info btn-block">Vehiculo</button>                     
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tipo de Orden</label>
                        <div class="col-sm-4">
                            <select name="type_id" class="form-control">
                                <option value="">Seleccione un Tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"                              
                                        {{ old('type_id', $post->type_id) == $type->id ? 'selected' : '' }} 
                                        >{{ $type->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<span class="help-block">:message</span>' ) !!}   
                        </div>
                        <label for="type_other" class="col-sm-2 control-label">Otro Tipo</label>
                        <div class="col-sm-4">
                            <input name="type_other" type="text" class="form-control" value="{{ old('type_other', $post->type_other) }}">
                            {!! $errors->first('type_other', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="equipment" class="col-sm-2 control-label">Equipo Intervenido</label>
                        <div class="col-sm-10">
                            <input name="equipment" type="text" class="form-control" value="{{ old('equipment', $post->equipment) }}">
                            {!! $errors->first('equipment', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="model" class="col-sm-2 control-label">Modelo</label>        
                        <div class="col-sm-4">
                            <input name="model" type="text" class="form-control" value="{{ old('model', $post->model) }}">
                            {!! $errors->first('model', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                        <label for="serie" class="col-sm-2 control-label">Serie</label>        
                        <div class="col-sm-4">
                            <input name="serie" type="text" class="form-control" value="{{ old('serie', $post->serie) }}">
                            {!! $errors->first('serie', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('problem_id') ? 'has-error' : '' }}">
                        <label for="inputEmail3" class="col-sm-2 control-label">Problema</label>
                        <div class="col-sm-4">
                            <select name="problem_id" class="form-control">
                                <option value="">Seleccione un Problema</option>
                               @foreach ($problems as $problem)
                                    <option value="{{ $problem->id }}"                              
                                        {{ old('problem_id', $post->problem_id) == $problem->id ? 'selected' : '' }} 
                                        >{{ $problem->name }}</option>
                                @endforeach  
                            </select>
                            {!! $errors->first('problem_id', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Trabajo Realizado</label>
                        <div class="col-sm-9">
                            <textarea name="job" 
                                class="form-control" 
                                placeholder="Ingresa un extracto de la publicación">{{ old('job', $post->job) }}</textarea>
                            {!! $errors->first('job', '<span class="help-block">:message</span>' ) !!}   
                        </div>
                    </div>
                    <button id="btn_order" type="button" class="btn btn-primary btn-block">Guardar y Siguiente</button>  
                </form>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_parameter">
                <form class="form-horizontal">
                    <div class="box-body">

                        <div class=" col-sm-6">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">PARAMETROS/MEDICIONES/NIVELES BT°</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Temperatura</label>
                                        <div class="col-sm-10 text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="temperatura_bt" value="S" checked> SI
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="temperatura_bt" value="N"> NO
                                            </label>                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Presion</label>
                                        <div class="col-sm-5">
                                            <input name="presion_alta_bt" type="number" class="form-control" placeholder="BAJA">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="presion_alta_bt" type="number" class="form-control" placeholder="ALTA">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Refrigerante</label>
                                        <div class="col-sm-9">
                                            <select name="refrigerantes_bt[]" class="form-control select2" 
                                                    multiple="multiple" 
                                                    data-placeholder="Seleccione una o mas etiquetas" 
                                                    style="width: 100%;">
                                                @foreach ($tags as $tag)
                                                    <option {{ collect(old('tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : '' }} 
                                                            value="{{ $tag->id }}"
                                                        >{{ $tag->name }}</option>
                                                @endforeach
                                            </select>                        
                                            {!! $errors->first('tags', '<span class="help-block">:message</span>' ) !!} 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Refrigerante</label>
                                        <div class="col-sm-9 text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_bt" value="A" checked> ALTA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_bt" value="M"> MEDIA
                                            </label> 
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_bt" value="B"> BAJA
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Aceite</label>
                                        <div class="col-sm-9  text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_bt" value="A" checked> ALTA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_bt" value="M"> MEDIA
                                            </label> 
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_bt" value="B"> BAJA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">PARAMETROS/MEDICIONES/NIVELES MT°</h3>
                                </div>
                            
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Temperatura</label>
                                        <div class="col-sm-10 text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="temperatura_mt" value="SI" checked> SI
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="temperatura_mt" value="NO"> NO
                                            </label>                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Presion</label>
                                        <div class="col-sm-5">
                                            <input name="presion_baja_mt" type="number" class="form-control" placeholder="BAJA">
                                        </div>
                                        <div class="col-sm-5">
                                            <input name="presion_alta_mt" type="number" class="form-control" placeholder="ALTA">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Refrigerante</label>
                                        <div class="col-sm-9">
                                            <select name="refrigerantes_mt[]" class="form-control select2" 
                                                    multiple="multiple" 
                                                    data-placeholder="Seleccione una o mas etiquetas" 
                                                    style="width: 100%;">
                                                @foreach ($tags as $tag)
                                                    <option {{ collect(old('tags', $post->tags->pluck('id') ))->contains($tag->id) ? 'selected' : '' }} 
                                                            value="{{ $tag->id }}"
                                                        >{{ $tag->name }}</option>
                                                @endforeach
                                            </select>                        
                                            {!! $errors->first('tags', '<span class="help-block">:message</span>' ) !!} 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Refrigerante</label>
                                        <div class="col-sm-9 text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_mt" value="A" checked> ALTA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_mt" value="M"> MEDIA
                                            </label> 
                                            <label class="checkbox-inline">
                                                <input type="radio" name="refrigerante_mt" value="B"> BAJA
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Aceite</label>
                                        <div class="col-sm-9  text-center">
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_mt" value="A" checked> ALTA
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_mt" value="M"> MEDIA
                                            </label> 
                                            <label class="checkbox-inline">
                                                <input type="radio" name="aceite_mt" value="B"> BAJA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>

                    <button id="btn_medicion" type="button" class="btn btn-primary btn-block">Guardar y Siguiente</button>
                    <!-- /.box-body -->
                </form>            
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_material">
            
                <form class="form-horizontal">
                    <!-- <div class="box-body"> -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Cantidad</label>
                        <div class="col-sm-2">
                            <input name="quantity"  
                                type="number" 
                                class="form-control pull-right">
                        </div>

                        <label for="inputEmail3" class="col-sm-2 control-label">Material</label>
                        <div class="col-sm-4">
                            <input name="detail" 
                                type="text" 
                                class="form-control">   
                        </div>

                        <div class="col-sm-2">
                            <button id="btn_material" type="button" class="btn btn-success btn-block">Agregar</button>    
                        </div>
                    </div>
                </form>
                <table id="material-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Detalle</th>
                            <th>Valorizador</th>
                        </tr>
                    </thead>
                    <tbody id="material-body">
                        <tr> 
                            <td colspan="3">No hay materiales seleccionados</td>
                        </tr>
                    </tbody>
                </table>

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="client" class="col-sm-2 control-label">Cliente</label>
                        <div class="col-sm-8">
                            <input name="client" 
                                type="text" 
                                class="form-control">   
                        </div>
                    </div>

                </form>
              

                <div id="signature-pad" >
                    <div class="signature-pad--body">
                        <canvas width="300" height="300"></canvas>
                    </div>
                    <button type="button" class="button clear" data-action="clear">Borrar</button>
                    <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                    <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                </div>

                <button id="confirm-button" type="button" class="btn btn-primary btn-block">Guardar y Autorizar</button>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Fotos del Problema</h4>
            </div>
            <form method="post" action="{{ route('admin.posts.photos.store', $post->id) }}" enctype="multipart/form-data"> <!-- /admin/products/4/images --><!-- admin/posts/{post}/photos -->
                {{ csrf_field() }}   
                <div class="modal-body">
                    <label for="inputPassword3" class="control-label">Titulo</label>
                    <input type="text" name="title" class="form-control" >  <!-- required-->
                    <label for="inputPassword3" class="control-label">Fotografia</label>
                    <input type="file" name="photo" class="form-control">
                                      
                    <!--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <textarea name="excerpt" 
                            class="form-control" 
                            placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>  
                    </div>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Subir nueva imagen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <!--<label>Titulo de la publicacion</label>-->
                    <textarea name="excerpt" 
                        class="form-control" 
                        placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>  
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Autorizar y Finalizar</button>
            </div>
        </div>
    </div>
</div>

@stop

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">


  <!--  <link rel="stylesheet" href="{{ asset('css/signature_pad/signature-pad.css') }}">-->
  
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('adminlte/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- bootstrap time picker -->
    <script src="{{ asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

    <!-- Signature Pad -->
    <script src="{{ asset('js/signature_pad/signature_pad.js') }}"></script>
    <script src="{{ asset('js/signature_pad/app.js') }}"></script>

    <script>
    
        $(document).ready(function(){
            
            /*$('#alias').keyup(function(){
                alias=$(this).val();
                var urlComprobarAlias = '/comprobar-alias-js/' + alias;
                axios.get(urlComprobarAlias)
                .then(response => {
                    coincidenciaAlias = response.data;
                    if(coincidenciaAlias){
                        $('#alias-alert').show('slow');
                    } else {
                        $('#alias-alert').hide('slow');
                    }
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            });    */

            document.getElementById("confirm-button").addEventListener("click", function (event) {
                $('#confirm-modal').modal('show');
            }, false);

            document.getElementById("photo-button").addEventListener("click", function (event) {
                $('#photo-modal').modal('show');
            }, false);

            document.getElementById("btn_order").addEventListener("click", function (event) {
                var arrival_at = document.getElementsByName("arrival_date_at")[0].value+" "+document.getElementsByName("arrival_hour_at")[0].value;;
                var goes_at = document.getElementsByName("arrival_date_at")[0].value+" "+document.getElementsByName("goes_hour_at")[0].value;;

                var type_id = document.getElementsByName("type_id")[0].value;
                var type_other = document.getElementsByName("type_other")[0].value;
//FALTA EQUIPO
                var model = document.getElementsByName("model")[0].value;
                var serie = document.getElementsByName("serie")[0].value;
                var problem_id = document.getElementsByName("problem_id")[0].value;
                var job = document.getElementsByName("job")[0].value;

            //    alert(arrival_at);
                var url = "{{ route('admin.posts.update', $post) }}"
                axios.put(url, {
                        'arrival_at': arrival_at,
                        'goes_at': goes_at,
                        'type_id': type_id,
                        'type_other': type_other,
                        'model': model,
                        'serie': serie,
                        'problem_id': problem_id,
                        'job': job
                }).then(function(response){
                    console.log(response.data);
                    document.getElementById('li_order').classList.remove("active");
                    document.getElementById('li_parameter').classList.add("active");
                    
                    document.getElementById('tab_order').classList.remove("active");
                    document.getElementById('tab_parameter').classList.add("active");
                })
                .catch(function (error){
                    console.log(error);        
                });
            }, false);


            document.getElementById("btn_material").addEventListener("click", function (event) {
                var quantity = document.getElementsByName("quantity")[0].value;
                var detail = document.getElementsByName("detail")[0].value;
                var url = "{{ route('admin.materials.store') }}"
                axios.post(url, {
                        'post_id': '{{ $post->id }}',
                        'quantity': quantity,
                        'detail': detail
                }).then(function(response){
                    listarMaterial("{{ $post->id }}");
                    console.log(response.data);
                })
                .catch(function (error){
                    console.log(error);        
                });

            }, false);

        });

        function listarMaterial(id) {
            var post = id;
            var url = '/admin/posts/' + post;
            axios.get(url).then(function(response){
                var total_registro = response.data.materials.length;
                var body = document.getElementById("material-body");
                document.getElementById("material-body").innerHTML = '';

                for (let indice = 0; indice < total_registro; indice++) {                    
                    var fila = document.createElement("tr");
                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
                   // spanTexto.title = data.ESPECIALIDAD_CODIGO[i]; 
                    spanTexto.textContent = response.data.materials[indice].quantity; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
                    spanTexto.textContent = response.data.materials[indice].detail; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
                    spanTexto.textContent = response.data.materials[indice].price; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    body.appendChild(fila);
                }
               // console.log(response.data);
              //  console.log(response.data.materials[0].detail);
            })
                .catch(function (error){
                console.log(error);
            });
        }

        $('.datepicker').datepicker({
            autoclose: true,
       //     format: 'dd/mm/yyyy' 
        })
    
        $('.select2').select2({
            tags: true
        });

        $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false,
        minuteStep: 5,
        defaultTime: 'current',
       
        })
    </script>
@endpush