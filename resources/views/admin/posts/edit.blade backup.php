@extends('admin.layout')

@section('header')
    <h1>
        Posts
        <small>Crear publicación</small>
    </h1>
    <ol class="breadcrumb">
    <li>
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> Inicio
        </a>
    </li>
    <li class="active">
        <a href="{{ route('admin.posts.index') }}">
            <i class="fa fa-list"></i> Posts
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
                                    <img src="{{ url($photo->url) }}" class="img-responsive">
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-8"> 
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label>Titulos de la publicacisson</label>
                        <input name="title" 
                            class="form-control" 
                            placeholder="Ingresa aqui el titulo de la publicación" 
                            value="{{ old('title', $post->title) }}">
                        {!! $errors->first('title', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                        <label>Contenido de la publicacion</label>
                        <textarea id="editor"
                            name="body"
                            rows="7" 
                            class="form-control" 
                            placeholder="Ingresa el contenido completo de la publicación">
                            {{ old('body', $post->body) }}</textarea>
                        {!! $errors->first('body', '<span class="help-block">:message</span>' ) !!}                     
                    </div>
                    <div class="form-group {{ $errors->has('iframe') ? 'has-error' : '' }}">
                        <label>Contenido embebido (iframe)</label>
                        <textarea id="editor"
                            name="iframe"
                            rows="4" 
                            class="form-control" 
                            placeholder="Ingresa el contenido de audio y video">
                            {{ old('iframe', $post->iframe) }}</textarea>
                        {!! $errors->first('iframe', '<span class="help-block">:message</span>' ) !!}                     
                    </div>
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Fecha de publicación:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input id="datepicker"
                                name="published_at" 
                                type="text" 
                                class="form-control pull-right" 
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                        <label>Categoria:</label>
                        <select name="category_id" class="form-control select2">
                            <option value="">Selecciona una Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"                              
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }} 
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category_id', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                    <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                        <label>Etiquetas:</label>  <!--var_dump(old('tags'))-->
                        <select name="tags[]" class="form-control select2" 
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
                    <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                        <label>Extracto de la publicacion</label>
                        <textarea name="excerpt" 
                            class="form-control" 
                            placeholder="Ingresa un extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
                        {!! $errors->first('excerpt', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                    <div class="form-group">
                        <div class="dropzone"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                    </div>
                </div>
            </div>
        </div>
        
    </form>
    
</div>
@stop

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ asset('adminlte/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor');
        //CKEDITOR.config.height = 315;
        //Initialize Select2 Elements
        $('.select2').select2({
            tags: true
        });

        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            dictDefaultMessage: 'Arrastra las fotos aqui para subirlas.',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            paramName: 'photo',
            maxFilesize: 1.9,  //valida
            acceptedFiles: 'image/*',   //solo imagen
         //   maxFiles: 5  //max imagenes
        });

        myDropzone.on('error', function(file, res){
            console.log(res.photo[0]);
            var msg = res.photo[0];
            $('.dz-error-message:last > span').text(msg);
        });
        Dropzone.autoDiscover = false;
    </script>
@endpush