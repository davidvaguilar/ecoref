@extends('admin.layout')

@section('header')
    <style>
        .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a {
            background-color: #3c8dbc;
            color: #fff;
        }
    </style>
    <h1>
        Orden de Trabajo Folio N° <button type="button" data-toggle="modal" data-target="#order-modal" class="btn btn-primary">{{ $post->title }}</button>
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
    @if ($post->photos->count() || $post->signature_id != null )
        <div class="box box-default">
            <div class="box-body">
                @foreach ($post->photos as $photo)
                    <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}" style="display: inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="col-xs-4">
                            <button type="submit"
                                    onclick="return confirm('¿Estas seguro de querer eliminar esta foto?')"
                                    class="btn btn-danger" 
                                    style="position:absolute">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                            <img src="{{ url($photo->url) }}" class="img-responsive" width="100px">
                        </div>
                    </form>
                @endforeach
                @if ($post->signature_id != null )
                    <div class="col-xs-4">
                        <img src="{{ url($post->signature->url) }}" class="img-responsive" width="100px"/>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="box box-default">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs nav-justified">
                    <li id="li_order" class="active"><a href="#tab_order" data-toggle="tab">ANTECEDENTES</a></li>
                    <li id="li_parameter"><a href="#tab_parameter" data-toggle="tab">MEDICIONES</a></li>
                    <li id="li_material"><a href="#tab_material" data-toggle="tab">MATERIALES</a></li>
                    <li id="li_photo" onclick="seleccionar_foto();"><a href="#tab_photo" data-toggle="tab">FOTOGRAFIAS</a></li>
                    <li id="li_signature" onclick="mostrar_order();"><a href="#tab_signature" data-toggle="tab">FIRMA</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_order">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="started_date_at" class="col-sm-4 control-label">Fecha Llegada: {{ $post->started_at->format('d/m/Y  H:i') }}</label>
                                <label for="technical" class="col-sm-6 control-label">Tecnico Responsable: {{ $post->owner->name }}</label> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Empresa: 
                                    <button data-toggle="modal" data-target="#client-modal" type="button" class="btn btn-success">{{ isset($post->client->id) ? $post->client->name : '' }}</button>
                                </label>
                                <label class="col-sm-4 control-label">Local: {{  isset($post->client->id) ? $post->client->title : '' }}</label>
                            </div>

                            <div id="type_div" class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
                                <label for="type_id" class="col-xs-4 control-label">Tipo de Orden</label>
                                <div class="col-xs-8">
                                    <select id="type_id"
                                            name="type_id" 
                                            class="form-control">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"                              
                                                {{ old('type_id', $post->type_id) == $type->id ? 'selected' : '' }} 
                                                >{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type_other" class="col-xs-4 control-label">Detalle de Orden</label>
                                <div class="col-xs-8">
                                    <input id="type_other" 
                                            name="type_other" 
                                            maxlength="80"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ old('type_other', $post->type_other) }}">
                                    {!! $errors->first('type_other', '<span class="help-block">:message</span>' ) !!}  
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="equipment" class="col-sm-2 control-label">Equipo Intervenido</label>
                                <div class="col-sm-10">
                                    <input id="equipment" 
                                            name="equipment"                                            
                                            maxlength="45"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ old('equipment', $post->equipment) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="model" class="col-sm-2 control-label">Modelo</label>        
                                <div class="col-sm-4">
                                    <input id="model" 
                                            name="model" 
                                            maxlength="30"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ old('model', $post->model) }}">
                                </div>
                                <label for="serie" class="col-sm-2 control-label">Serie</label>        
                                <div class="col-sm-4">
                                    <input id="serie" 
                                            name="serie" 
                                            maxlength="30"
                                            type="text" 
                                            class="form-control" 
                                            value="{{ old('serie', $post->serie) }}">
                                </div>
                            </div>

                            <div id="problem_div" class="form-group {{ $errors->has('problem_id') ? 'has-error' : '' }}">
                                <label for="problem_id" class="col-xs-4 control-label">Problema</label>
                                <div class="col-xs-8">
                                    <select id="problem_id" 
                                            name="problem_id" 
                                            class="form-control">
                                        @foreach ($problems as $problem)
                                            <option value="{{ $problem->id }}"                              
                                                    {{ old('problem_id', $post->problem_id) == $problem->id ? 'selected' : '' }}>
                                                {{ $problem->name }}
                                            </option>
                                        @endforeach  
                                    </select> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="job" class="col-sm-2 control-label">Trabajo Realizado
                                    <small>(<span class="cont-job">{{ strlen($post->job) }}</span>/140)</small>
                                </label>
                                
                                <div class="col-sm-10">
                                    <textarea id="job" 
                                            name="job" 
                                            maxlength="140"
                                            class="form-control"
                                            placeholder="Ingresa maximo 140 caracteres">{{ old('job', $post->job) }}</textarea>
                                    {!! $errors->first('job', '<span class="help-block">:message</span>' ) !!}   
                                </div>
                            </div>
                            <button id="order-button" type="button" class="btn btn-primary btn-block">Guardar y Siguiente</button>  
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_parameter">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="type" class="col-xs-2 control-label">Tipo</label>
                                <div class="col-xs-10">
                                    <select id="type"
                                            name="type" 
                                            class="form-control" 
                                            style="font-weight: bold;">
                                        <option value="">Seleccione una opcion</option>
                                        <option value="BAJA" {{ isset($post->parameter->id) && $post->parameter->type == 'BAJA' ? 'selected' : '' }}>
                                                BAJA TEMPERATURA
                                        </option>
                                        <option value="MEDIA" {{ isset($post->parameter->id) && $post->parameter->type == 'MEDIA' ? 'selected' : '' }}>
                                                MEDIA TEMPERATURA
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-2 control-label">Temperatura</label>
                                <div class="col-xs-10 text-center">
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="temperature" 
                                                value="SI" 
                                                {{ isset($post->parameter->id) && $post->parameter->temperature == 'SI' ? 'checked' : '' }}> SI CUMPLE
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="temperature" 
                                                value="NO" 
                                                {{ isset($post->parameter->id) && $post->parameter->temperature == 'NO' ? 'checked' : '' }}> NO CUMPLE
                                    </label>                          
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pressure_low" class="col-xs-2 control-label">Presion</label>
                                <div id="pressure_low-div" class="col-xs-5">
                                    <input id="pressure_low"
                                            name="pressure_low" 
                                            type="number" 
                                            min="1" max="999"
                                            class="form-control" 
                                            placeholder="BAJA"
                                            min="0"
                                            value="{{ isset($post->parameter->id) ? $post->parameter->pressure_low : '' }}">
                                </div>
                                <div id="pressure_high-div" class="col-xs-5">
                                    <input id="pressure_high"
                                            name="pressure_high" 
                                            type="number" 
                                            min="1" max="999"
                                            class="form-control" 
                                            placeholder="ALTA" 
                                            min="0"
                                            value="{{ isset($post->parameter->id) ? $post->parameter->pressure_high : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="refrigerant_id" class="col-xs-3 control-label">Refrigerante</label>
                                <div class="col-xs-9">
                                    <select id="refrigerant_id" 
                                            name="refrigerant_id" 
                                            class="form-control"
                                            style="font-weight: bold;">
                                        <option value="">Seleccione refrigerante</option>
                                        @foreach ($refrigerants as $refrigerant)
                                            <option value="{{ $refrigerant->id }}"                              
                                                    {{ old('refrigerant_id', $post->parameter->refrigerant_id) == $refrigerant->id ? 'selected' : '' }}>
                                                {{ $refrigerant->name }}
                                            </option>
                                        @endforeach  
                                    </select> 
                                           
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label">Refrigerante</label>
                                <div class="col-xs-9 text-center">
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="refrigerant" 
                                                value="ALTA" 
                                                {{ isset($post->parameter->id) && $post->parameter->refrigerant == 'ALTA' ? 'checked' : '' }}> ALTA
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="refrigerant" 
                                                value="MEDIA" 
                                                {{ isset($post->parameter->id) && $post->parameter->refrigerant == 'MEDIA' ? 'checked' : '' }}> MEDIA
                                    </label> 
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="refrigerant" 
                                                value="BAJA" 
                                                {{  isset($post->parameter->id) && $post->parameter->refrigerant == 'BAJA' ? 'checked' : '' }}> BAJA
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-3 control-label">Aceite</label>
                                <div class="col-xs-9 text-center">
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="oil" 
                                                value="ALTA" 
                                                {{ isset($post->parameter->id) && $post->parameter->oil == 'ALTA' ? 'checked' : '' }}> ALTA
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="oil" 
                                                value="MEDIA" 
                                                {{ isset($post->parameter->id) && $post->parameter->oil == 'MEDIA' ? 'checked' : '' }}> MEDIA
                                    </label> 
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="oil" 
                                                value="BAJA" 
                                                {{ isset($post->parameter->id) && $post->parameter->oil == 'BAJA' ? 'checked' : '' }}> BAJA
                                    </label>
                                </div>
                            </div>
                            <button id="parameter-button" type="button" class="btn btn-primary btn-block">Guardar y Siguiente</button>
                        </div>            
                    </div>

                    <div class="tab-pane" id="tab_photo">
                        <form method="post" action="{{ route('admin.posts.photos.store', '#photo') }}" enctype="multipart/form-data" class="form-horizontal"> <!-- /admin/products/4/images --><!-- admin/posts/{post}/photos -->
                            {{ csrf_field() }}   
                                <input type="hidden" 
                                    name="order" 
                                    value="{{ $post->id }}"> 
                            <div class="form-group">
                                <div class="col-xs-12 text-center">
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="type" 
                                                value="PROBLEMA" 
                                                checked> Foto Trabajo
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" 
                                                name="type" 
                                                value="ORDEN"> Foto Reporte
                                    </label>                          
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" class="col-xs-3 control-label">Titulo</label>
                                <div class="col-xs-9">
                                    <input id="title" 
                                            name="title"
                                            maxlength="20"
                                            type="text" 
                                            class="form-control" 
                                            autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-xs-3 control-label">Fotografia</label>
                                <div class="col-xs-9">
                                    <input id="photo" 
                                            name="photo" 
                                            type="file" 
                                            class="form-control" 
                                            accept="image/*" required />
                                </div>                                    
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Subir nueva imagen</button>
                        </form>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_material">
                        <div id="quantity-div" class="form-group col-xs-3">
                            <label for="quantity">Cantidad</label>
                            <input id="quantity"
                                    name="quantity"  
                                    type="number"  
                                    min="1" max="99"
                                    maxlength="2"
                                    class="form-control"
                                    value="1">
                        </div>
                        <div id="detail-div" class="form-group col-xs-9">
                            <label for="detail">Material</label>
                            <input id="detail"
                                    name="detail" 
                                    maxlength="50"
                                    type="text" 
                                    class="form-control"
                                    autocomplete="off">
                        </div>
                            <button id="material-button"
                                    data-id="{{ $post->id }}"
                                    data-url="{{ route('admin.materials.store') }}"
                                    type="button"
                                    class="btn btn-success btn-block">Agregar</button> 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Detalle</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="material-body">
                                    @if ($post->materials->count())
                                        @foreach ($post->materials as $material)
                                            <tr>
                                                <td>{{ $material->quantity }}</td>
                                                <td>{{ $material->detail }}</td>
                                                <td>
                                                    <button class="btn btn-danger material-button"
                                                            type="button"
                                                            onclick="eliminar_material({{ $material->id }});"                                                           
                                                        ><i class="fa fa-fw fa-times"></i></button>                                               
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

                    <div class="tab-pane" id="tab_signature">
                        <form id="signature-form" method="POST" action="{{ route('admin.posts.signature.store', $post->id) }}" class="form-horizontal" >
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-xs-5">
                                    <p>Fecha Llegada: <label id="resumen_fecha_llegada"></label></p>
                                </div>
                                <div class="col-xs-7">
                                    <p>Tecnico Responsable: <label id="resumen_tecnico_nombre"></label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-4">
                                    <p>Empresa: <label id="resumen_empresa_nombre"></label></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Local: <label id="resumen_empresa_titulo"></label></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Direccion: <label id="resumen_empresa_direccion"></label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-5">
                                    <p>Tipo de Orden: <label id="resumen_tipo_nombre"></label></p>
                                </div>
                                <div class="col-xs-7">
                                    <p>Detalle de Orden: <label id="resumen_tipo_otro"></label></p>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="col-xs-4">
                                    <p>Equipo Interv: <label id="resumen_orden_equipo"></label></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Modelo: <label id="resumen_orden_modelo"></label></p>
                                </div>
                                <div class="col-xs-4">
                                    <p>Serie: <label id="resumen_orden_serie"></label></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Problema: <label id="resumen_problema_nombre"></label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Trabajo realizado: <label id="resumen_orden_trabajo"></label></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Parametros/Mediciones de <label id="resumen_parametros_tipo">{{ isset($post->parameter->id) && $post->parameter->type <> NULL ? $post->parameter->type.' TEMPERATURA' : '' }} </label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Temperatura <label id="resumen_parametros_temperatura">{{ isset($post->parameter->id) && $post->parameter->temperature <> NULL ? $post->parameter->temperature.' CUMPLE' : '' }} </label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <p>Presion Baja: <label id="resumen_parametros_presion_baja">{{ isset($post->parameter->id) ? $post->parameter->pressure_low : '' }} </label></p>
                                </div>
                                <div class="col-xs-6">
                                    <p>Presion Alta: <label id="resumen_parametros_presion_alta">{{ isset($post->parameter->id) ? $post->parameter->pressure_high : '' }} </label></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <p>Refrigerante: <label id="resumen_refrigerante_nombre"></label></p>
                                </div>

                                <div class="col-xs-6">
                                    <p>Ref. Nivel: <label id="resumen_refrigerante_nivel"></label></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <p>Aceite: <label id="resumen_parametro_aceite"></label></p>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Detalle</th>
                                    </tr>
                                </thead>
                                <tbody id="resumen_materiales">
                                </tbody>
                            </table>
                            <div class="form-group">
                            
                                <div class="col-sm-9" >
                                    <textarea name="observation"
                                        class="form-control" 
                                        style="display:none;"
                                        placeholder="Maximo 140 caracteres" >{{ old('observation', $post->observation) }}</textarea>
                                    {!! $errors->first('observation', '<span class="help-block">:message</span>' ) !!}   
                                </div>
                            </div>
                            <div id="signature-area" class="col-sm-offset-3 col-sm-6">
                                <canvas id="signature" class="signature-pad" style="border: 2px dashed #ccc" width="800px" height="200px"></canvas>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="base64" id="base64">
                                    <button id="signature-clear" type="button" class="btn btn-info pull-left">Borrar Firma</button>   <!--  data-action="clear"-->              
                                    <button id="signature-finished" 
                                        type="button" 
                                        class="btn btn-success pull-right">Finalizar</button> <!-- id="signature-png" data-action="save-png"-->
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- /.tab-pane -->
                </div>
            <!-- /.tab-content -->
            </div>
        </div>
        <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
   
</div>

<div class="modal fade" id="client-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Cliente</h4>
            </div>
            <form method="post" action="{{ route('admin.posts.selectClient', $post->id) }}" class="form-horizontal">
                {{ csrf_field() }} 
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Cliente</label>
                        <div class="col-xs-4">
                                <select id="name"
                                    name="name" 
                                    class="form-control" require>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->name }}"
                                        {{ $post->client->name == $client->name ? 'selected' : '' }} >
                                        {{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <input id="code"
                                name="code" 
                                type="text"
                                class="form-control" 
                                placeholder="ID LOCAL" 
                                value="{{ $post->client->code }}" 
                                autocomplete="off" required>
                        </div>
                        {!! $errors->first('code', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Buscar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="client-title" class="modal-title" id="exampleModalLabel">MODIFICACION AL FOLIO</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.posts.updateTitle', $post) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="col-form-label">Numero de Folio</label>
                        <input name="title" type="number" class="form-control" value="{{ $post->title }}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" 
                            onclick="return confirm('¿Estas seguro de querer modificar numero de folio?')" 
                            class="btn btn-primary pull-left">Cambiar Folio</button>
                </form> 
                <form method="POST" 
                        action="{{ route('admin.posts.updateFinished', $post) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <button type="submit" 
                                onclick="return confirm('¿Estas seguro que desea finalizar la orden de trabajo?')"
                                class="btn btn-danger"
                        >Finalizar</button>
                </form>
            </div>
            
        </div>
    </div>
</div>

@stop

@push('styles')
    
@endpush

@push('scripts')
    <script src="{{ asset('js/signature_pad/signature_pad.min.js') }}"></script>
    <script>

        function resizeCanvas () {
            var gameArea = document.getElementById('signature-area');
            var newWidth = gameArea.clientWidth;
            var gameCanvas = document.getElementById('signature');
            gameCanvas.width = newWidth-30;
        }

        $(document).ready(function(){
            var canvas = document.querySelector("canvas");
            var signaturePad = new SignaturePad(canvas);
            window.addEventListener('resize', resizeCanvas, false);
            window.addEventListener('orientationchange', resizeCanvas, false);
            resizeCanvas();

            $('#job').keyup(function() {
                cantidad = $('#job').val().length;
                $('.cont-job').html(cantidad);   
            });           

            document.getElementById('signature-clear').addEventListener('click', function () {
                signaturePad.clear();
            });

            document.getElementById('signature-finished').addEventListener('click', function () {
                if (signaturePad.isEmpty()) {
                    alert("Por favor, proporcione una firma primero..");
                } else {
                    var image = canvas.toDataURL();
                    document.getElementById("base64").value = image;
                    var form = document.getElementById('signature-form');
                    form.submit();
                }
            });
            
            document.getElementById("order-button").addEventListener("click", function (event) {
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
                    var url = "{{ route('admin.posts.update', $post) }}"
                    axios.put(url, {
                            'type_id': type_id,
                            'type_other': type_other,
                            'equipment': equipment,
                            'model': model,
                            'serie': serie,
                            'problem_id': problem_id,
                            'job': job
                    }).then(function(response){
                       // console.log(response.data);
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
                    var url = "{{ route('admin.parameters.update', $post->parameter->id) }}"
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

            document.getElementById("material-button").addEventListener("click", function (event) {
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
                            'post_id': '{{ $post->id }}',
                            'quantity': quantity,
                            'detail': detail
                    }).then(function(response){
                        document.getElementsByName("quantity")[0].value = 1;
                        document.getElementsByName("detail")[0].value = "";
                        listMaterial();
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
            }, false);

            var overlay = document.getElementsByClassName('overlay');  // ICONO DE ESPERA
            while (overlay.length > 0) overlay[0].remove();

        });
        
        function eliminar_material(id){
            var confirmacion = confirm('¿Estas seguro de querer eliminar este material?')
            if( confirmacion ){
                var url = "{{ route('admin.materials.desactivar') }}";
                axios.put(url, {
                            'id': id
                }).then(function(response){
                    console.log(response.data);                    //location.reload(true);
                    listMaterial();
                })
                .catch(function (error){
                    console.log(error); 
                });
            }            
        }

        function listMaterial() {
            var url = "{{ route('admin.posts.material', $post) }}";
            axios.get(url).then(function(response){
                var total_registro = response.data.length; //materials
                console.log(total_registro);
                var body = document.getElementById("material-body");
                document.getElementById("material-body").innerHTML = '';

                for (let indice = total_registro-1; indice >= 0; indice--) {                    
                    var fila = document.createElement("tr");
                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
               
                    spanTexto.textContent = response.data[indice].quantity; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    var spanTexto = document.createElement("span");
                    spanTexto.textContent = response.data[indice].detail; 
                    celda.appendChild(spanTexto);
                    fila.appendChild(celda);

                    var celda = document.createElement("td");
                    celda.innerHTML = `<button class="btn btn-danger"
                                                type="button"
                                                onclick="eliminar_material('${response.data[indice].id}')" >
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>`;
                    fila.appendChild(celda);

                    body.appendChild(fila);
                }
            })
            .catch(function (error){
                console.log(error);
            });
        }

        function mostrar_order() {
            var url = "{{ route('admin.posts.show', $post->id) }}";
            axios.get(url).then(function(response){
                //  console.log(response.data);
                var total_registro = response.data.post.length;              
                if( total_registro > 0){
                    var year =  response.data.post[0].started_at.substring(0, 4);                    
                    var month =  response.data.post[0].started_at.substring(5,7);                    
                    var day = response.data.post[0].started_at.substring(8, 10);
                    var hour =  response.data.post[0].started_at.substring(11, 16);
                    document.getElementById("resumen_fecha_llegada").innerHTML = day+'/'+month+'/'+year+' '+hour;
                    document.getElementById("resumen_tecnico_nombre").innerHTML = response.data.post[0].owner.name;
                    document.getElementById("resumen_empresa_nombre").innerHTML = response.data.post[0].client.name;
                    document.getElementById("resumen_empresa_titulo").innerHTML = response.data.post[0].client.title;
                    document.getElementById("resumen_empresa_direccion").innerHTML = response.data.post[0].client.adress;
                    document.getElementById("resumen_tipo_nombre").innerHTML = response.data.post[0].type.name;
                    document.getElementById("resumen_tipo_otro").innerHTML = response.data.post[0].type_other;
                    document.getElementById("resumen_orden_equipo").innerHTML = response.data.post[0].equipment;
                    document.getElementById("resumen_orden_modelo").innerHTML = response.data.post[0].model;
                    document.getElementById("resumen_orden_serie").innerHTML = response.data.post[0].serie;
                    document.getElementById("resumen_problema_nombre").innerHTML = response.data.post[0].problem.name;
                    document.getElementById("resumen_orden_trabajo").innerHTML = response.data.post[0].job;
                    document.getElementById("resumen_parametros_tipo").innerHTML = response.data.post[0].parameter.type;
                    document.getElementById("resumen_parametros_temperatura").innerHTML = response.data.post[0].parameter.temperature;
                    document.getElementById("resumen_parametros_presion_baja").innerHTML = response.data.post[0].parameter.pressure_low;
                    document.getElementById("resumen_parametros_presion_alta").innerHTML = response.data.post[0].parameter.pressure_high;
                    total_refrigerantes = response.data.refrigerants.length;
                    for (let indice = 0; indice < total_refrigerantes; indice++) {  
                        if(response.data.post[0].parameter.refrigerant_id == response.data.refrigerants[indice].id ){
                            document.getElementById("resumen_refrigerante_nombre").innerHTML = response.data.refrigerants[indice].name;
                        }
                    }
                    document.getElementById("resumen_refrigerante_nivel").innerHTML = response.data.post[0].parameter.refrigerant;
                    document.getElementById("resumen_parametro_aceite").innerHTML = response.data.post[0].parameter.oil;
                    total_materiales = response.data.post[0].materials.length;

                    var body = document.getElementById("resumen_materiales");
                    document.getElementById("resumen_materiales").innerHTML = '';
                    for (let indice = 0; indice < total_materiales; indice++) {                    
                        var fila = document.createElement("tr");
                        var celda = document.createElement("td");
                        var spanTexto = document.createElement("span");
                        spanTexto.textContent = response.data.post[0].materials[indice].quantity; 
                        celda.appendChild(spanTexto);
                        fila.appendChild(celda);
                        var celda = document.createElement("td");
                        var spanTexto = document.createElement("span");
                        spanTexto.textContent = response.data.post[0].materials[indice].detail; 
                        celda.appendChild(spanTexto);
                        fila.appendChild(celda);

                        body.appendChild(fila);
                    }
                }         
            })
            .catch(function (error){
                console.log(error);
            });
        }

        function seleccionar_foto(){
            window.location.hash = '#photo';
        }

        switch (window.location.hash ) {
            case '#photo':
                    document.getElementById('li_order').classList.remove("active");
                    document.getElementById('li_parameter').classList.remove("active");            
                    document.getElementById('li_material').classList.remove("active");
                    document.getElementById('li_signature').classList.remove("active");                    
                    document.getElementById('li_photo').classList.add("active");
                    
                    document.getElementById('tab_order').classList.remove("active");
                    document.getElementById('tab_parameter').classList.remove("active");
                    document.getElementById('tab_material').classList.remove("active");            
                    document.getElementById('tab_signature').classList.remove("active");          
                    document.getElementById('tab_photo').classList.add("active");
                break;
            default:
                break;
        }
    </script>
@endpush