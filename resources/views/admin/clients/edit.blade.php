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

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Clientes</h3>
        
        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <form method="post" action="{{ route('admin.clients.update', $client->id) }}" class="form-horizontal">
                {{ csrf_field() }} 
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="type_other" class="col-xs-2 control-label">Empresa</label>
                    <div class="col-xs-4">
                        <input name="name" 
                                type="text" 
                                class="form-control" 
                                value="{{ old('name', $client->name) }}">
                        {!! $errors->first('type_other', '<span class="help-block">:message</span>' ) !!}  
                    </div>

                    <label for="code" class="col-sm-2 control-label">Id Local</label>
                    <div class="col-sm-3">
                        <input id="code" name="code" type="text" class="form-control" value="{{ old('code', $client->code) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Local</label>
                    <div class="col-sm-10">
                        <input id="title" name="title" type="text" class="form-control" value="{{ $client->title }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="adress" class="col-sm-2 control-label">Direccion</label>        
                    <div class="col-sm-5">
                        <input id="adress" name="adress" type="text" class="form-control" value="{{ old('adress', $client->adress) }}">
                    </div>
                    <label for="city" class="col-sm-2 control-label">Ciudad</label>
                    <div class="col-sm-3">
                        <input id="city" name="city" type="text" class="form-control" value="{{ old('city', $client->city) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="people_id" class="col-sm-3 control-label">Emails</label>
                    <div class="col-sm-9">
                            
                        <select name="peoples[]" class="form-control select2" 
                                multiple="multiple" 
                                data-placeholder="Seleccione uno o mas emails" 
                                style="width: 100%;">
                            @foreach ($peoples as $people)
                                <option {{ collect(old('peoples', $client->peoples->pluck('id') ))->contains($people->id) ? 'selected' : '' }} 
                                        value="{{ $people->id }}"
                                        >{{ $people->email }}</option>
                            @endforeach
                        </select>              
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Guardar Datos de la Empresa</button>  
            </form>
                
         
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
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
    <script src="{{-- asset('js/signature_pad/app.js') --}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>-->


    <script>
        $('.select2').select2({
            tags: true
        });
    </script>
@endpush