@extends('admin.layout')

@section('header')
    <h1>
        Nombre de la Empresa {{ $client->name }}
    </h1>
@stop

@section('content')
<div id="error-div">
    @if( $errors->any() )
        @foreach( $errors->all() as $error )
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span>{{ $error }}</span>
        </div>
        @endforeach
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs nav-justified">
            <li id="li_data" class="active"><a href="#tab_data" data-toggle="tab">DATOS DE LA EMPRESA</a></li>
            <li id="li_email"><a href="#tab_email" data-toggle="tab">EMAIL CONTACTO</a></li>
           
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_data">

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="type_other" class="col-xs-4 control-label">Nombre Empresa</label>
                        <div class="col-xs-8">
                            <input name="name" 
                                    type="text" 
                                    class="form-control" 
                                    value="{{ old('name', $client->name) }}">
                            {!! $errors->first('type_other', '<span class="help-block">:message</span>' ) !!}  
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nombre Local</label>
                        <div class="col-sm-10">
                            <input id="title" name="title" type="text" class="form-control" value="{{ $client->title }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="model" class="col-sm-2 control-label">Direccion</label>        
                        <div class="col-sm-4">
                            <input id="model" name="model" type="text" class="form-control" value="{{ old('adress', $client->adress) }}">
                        </div>
              
                    </div>

                    <div class="form-group">
                        <label for="job" class="col-xs-2 control-label">Ciudad</label>
                        <div class="col-xs-10">
                            <input id="serie" name="serie" type="text" class="form-control" value="{{ old('serie', $client->city) }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar Datos de la Empresa</button>  
                </form>
            </div>
          
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_email">
            
                <div id="quantity-div" class="form-group col-xs-3">
                    <label for="quantity">Nombre</label>
                    <input id="first name"
                            name="quantity"  
                            type="number" 
                            class="form-control" value="1">
                </div>
                <div id="detail-div" class="form-group col-xs-9">
                    <label for="detail">Email</label>
                    <input id="email"
                            name="detail" 
                            type="text" 
                            class="form-control">
                </div>  
    
                <button type="button" class="btn btn-success btn-block">Agregar email</button> 
                <div class="table-responsive">
                    <table id="material-table" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Detalle</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="material-body">
                            @if ($client->peoples->count())
                                @foreach ($client->peoples as $people)
                                    <tr>
                                        <td>{{ $people->first_name }}</td>
                                        <td>
                                            @foreach ($people->emails as $email)
                                                {{ $email->alias }}{!! htmlspecialchars('@')!!}{{$email->domain }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <form method="POST" 
                                                action="{{-- route('admin.peoples.destroy', $people) --}}" 
                                                style="display: inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" 
                                                    onclick="return confirm('¿Estas seguro de querer eliminar este material?')"
                                                    class="btn btn-danger"
                                                ><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>        
                                @endforeach
                            @else
                                <tr> 
                                    <td colspan="3">No hay materiales seleccionados</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>             
            </div>

            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

@stop

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}"/>  
    <style>
        .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a {
            background-color: #3c8dbc;
            color: #fff;
        }
    </style>
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
    <!-- Signature Pad 
    <script src="{{-- asset('js/signature_pad/signature_pad.js') --}}"></script>
    <script src="{{-- asset('js/signature_pad/app.js') --}}"></script>-->

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <script>
        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas);

        function resizeCanvas () {
            var gameArea = document.getElementById('signature-area');
            var newWidth = gameArea.clientWidth;
            var gameCanvas = document.getElementById('signature');
            gameCanvas.width = newWidth-30;
        }

     /*   $(document).ready(function(){

            resizeCanvas();
            window.addEventListener('resize', resizeCanvas, false);
            window.addEventListener('orientationchange', resizeCanvas, false);

            document.getElementById('signature-clear').addEventListener('click', function () {
                signaturePad.clear();
            });
            
         
            
            document.getElementById("client-button").addEventListener("click", function (event) {
                $('#client-modal').modal('show');
            }, false);

            document.getElementById("btn_order").addEventListener("click", function (event) {
                this.disabled = false;
                document.getElementById("type_div").classList.remove("has-error");
                document.getElementById("problem_div").classList.remove("has-error");
                var type_id = document.getElementsByName("type_id")[0].value;
                var type_other = document.getElementsByName("type_other")[0].value;
                var equipment = document.getElementsByName("equipment")[0].value;
                var model = document.getElementsByName("model")[0].value;
                var serie = document.getElementsByName("serie")[0].value;
                var problem_id = document.getElementsByName("problem_id")[0].value;
                var job = document.getElementsByName("job")[0].value;
                var flag = true;

                if( type_id.length == 0 ){
                    document.getElementById("type_div").classList.add("has-error");
                    flag = false;
                }
                if( problem_id.length == 0 ){
                    document.getElementById("problem_div").classList.add("has-error");
                    flag = false;
                }

                if( flag ){
                    var url = "{{-- route('admin.posts.update', $post) --}}"
                    axios.put(url, {
                            'type_id': type_id,
                            'type_other': type_other,
                            'equipment': equipment,
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
                }
               
            }, false);

            document.getElementById("parameter-button").addEventListener("click", function (event) {
           
                var flag = true;
                document.getElementById("pressure_high-div").classList.remove("has-error");
                document.getElementById("pressure_low-div").classList.remove("has-error");
                
                var refrigerant_id = document.getElementsByName("refrigerant_id")[0].value;

                var type = document.getElementsByName("type")[0].value;
                var temperature_radio = document.getElementsByName("temperature");
                var temperature = "";
                for(var i = 0; i < temperature_radio.length; i = i + 1){
                    if(temperature_radio[i].checked)
                        temperature = temperature_radio[i].value;
                }
                var pressure_high = document.getElementsByName("pressure_high")[0].value;                
                var pressure_low = document.getElementsByName("pressure_low")[0].value;

                if( !(pressure_high > 0) && !(pressure_high == '') ){
                    flag = false;
                    document.getElementById("pressure_high-div").classList.add("has-error")
                } 
                if( !(pressure_low == '') ){
                    if( !(pressure_low > 0) ){
                        flag = false;
                        document.getElementById("pressure_low-div").classList.add("has-error")
                    }
                } 
                
                var refrigerant_radio = document.getElementsByName("refrigerant");  
                var refrigerant = "";
                for(var i=0; i<refrigerant_radio.length; i= i+1){
                    if(refrigerant_radio[i].checked)
                        refrigerant = refrigerant_radio[i].value;
                }
                var oil_radio = document.getElementsByName("oil");  
                var oil = "";
                for(var i = 0; i < oil_radio.length; i = i + 1){
                    if(oil_radio[i].checked)
                        oil = oil_radio[i].value;
                }

                if( flag ){
                    var url = "{{-- route('admin.parameters.update', $post->parameter->id) --}}"
                    axios.put(url, {
                            'type': type,
                            'temperature': temperature,
                            'pressure_high': pressure_high,
                            'pressure_low': pressure_low,
                            'refrigerant_id': refrigerant_id,
                            'refrigerant': refrigerant,
                            'oil': oil
                    }).then(function(response){
                        console.log(response.data);
                        document.getElementById('li_parameter').classList.remove("active");
                        document.getElementById('li_material').classList.add("active");
                        
                        document.getElementById('tab_parameter').classList.remove("active");
                        document.getElementById('tab_material').classList.add("active");
                    })
                    .catch(function (error){
                        console.log(error);        
                    });
                }   
            }, false);
        });  */

        function addMaterial(){
            document.getElementById('error-div').innerHTML= "";
            document.getElementById("quantity-div").classList.remove("has-error");            
            document.getElementById("detail-div").classList.remove("has-error");
            var quantity = document.getElementsByName("quantity")[0].value;
            var detail = document.getElementsByName("detail")[0].value;
            var flag = true;
            if( !(quantity > 0) ){
                flag = false;
                document.getElementById("quantity-div").classList.add("has-error")
            } 
            if( detail.length == 0 ){
                flag = false;
                document.getElementById("detail-div").classList.add("has-error")
            }
            if( flag ){
                var url = "{{ route('admin.materials.store') }}"
                axios.post(url, {
                        'post_id': '{{-- $post->id --}}',
                        'quantity': quantity,
                        'detail': detail
                }).then(function(response){
                    document.getElementsByName("quantity")[0].value = 1;
                    document.getElementsByName("detail")[0].value = "";
                    listMaterial("{{-- $post->id --}}");
                    console.log(response.data);
                })
                .catch(function (error){
                    var div = document.createElement('div');
                    div.classList.add('alert');
                    div.classList.add('alert-danger');
                    div.classList.add('alert-dismissible');
                    var span = document.createElement('span');
                    span.innerHTML = "Error, al ingresar material";
                    div.appendChild(span);
                    document.getElementById('error-div').appendChild(div);
                    console.log(typeof(error.response.data.errors.quantity[0]) !== 'undefined'); 
                });
            }
        }

        function listMaterial(id) {
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
               
                    spanTexto.textContent = response.data.materials[indice].quantity; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
                    spanTexto.textContent = response.data.materials[indice].detail; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    celda.innerHTML = `<button type="submit" 
                            onclick="return confirm('¿Estas seguro de querer eliminar este material?')" 
                            class="btn btn-danger">
	                            <i class="fa fa-times"></i></button>`;
                    fila.appendChild(celda);

                    body.appendChild(fila);
                }
            })
            .catch(function (error){
                console.log(error);
            });
        }

    </script>
@endpush