@extends('admin.layout')

@section('header')
    <h1>Ordenes de Trabajo</h1>    
@stop


@section('content')

@if ($errors->any())
    <ul class="list-group">
    @foreach ($errors->all() as $error) 
        <li class="list-group-item list-group-item-danger">
        {{ $error }}
        </li>
    @endforeach
    </ul>
@endif

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Ordenes</h3>
            @if(@Auth::user()->hasRole('Writer'))
                @can('create', new App\Post)
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i> Crear OT
                    </button>
                @endcan
            @else
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#createModal">
                    <i class="fa fa-plus"></i> Crear Orden de Trabajo
                </button>
            @endif
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        @can('update', $posts->first())<th></th>@endcan                      
                        @can('update', $posts->first())
                            <th style="min-width:70px">Enviar</th>
                        @endcan
                        @if(!@Auth::user()->hasRole('Writer'))
                            <th style="min-width:70px">WhatsApp</th>
                        @endif
                        @if(!@Auth::user()->hasRole('Writer'))
                            <th>Responsable</th>
                        @endif
                        <th>Folio</th> 
                        @if(!@Auth::user()->hasRole('Writer'))
                            <th>Estado</th>
                        @endif
                        <th>Fecha Asignación</th>
                        <th>Fecha Realización</th>
                        <th style="min-width:140px">Local</th>
                        <th>Detalle OT</th>
                        <th>Tipo de Orden</th>
                        <th>Problema</th>
                        @role('Admin')<th></th>@endrole
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            @can('update', $post)
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post) }}" 
                                            class="btn btn-info" title="Editar OT">
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </a>
                                </td> 
                            @endcan
                            @can('update', $post)
                            <td>
                                @if( $post->records->count() )
                                    <form method="POST" 
                                        action="{{ route('admin.posts.updateSend', $post) }}" 
                                        style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="btn-group">
                                            <button type="submit"
                                                onclick="return confirm('¿Estas seguro de querer Enviar esta OT?')"
                                                class="btn btn-primary"
                                                title="Enviar PDF al Cliente"
                                            ><i class="fa fa-fw fa-envelope-o"></i></button>
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                            @role('Admin') 
                                                @foreach ($post->records->reverse() as $record)
                                                    <li>
                                                        <a href="{{ url($record->url) }}"
                                                                title="PDF creado el {{ $record->created_at->format('d-m-Y H:i') }}"
                                                                class="btn btn-lg btn-default"
                                                                target="_blank">
                                                            <i class="fa fa-fw fa-file-pdf-o"></i>
                                                            Creado {{ $record->created_at->diffForHumans() }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @else 
                                                <li>
                                                    <a href="{{ url($post->records->last()->url) }}"
                                                            title="PDF creado el {{ $post->records->last()->created_at->format('d-m-Y H:i') }}"
                                                            class="btn btn-lg btn-default"
                                                            target="_blank">
                                                        <i class="fa fa-fw fa-file-pdf-o"></i>
                                                        Creado {{ $post->records->last()->created_at->diffForHumans() }}
                                                    </a>
                                                </li>
                                            @endrole
                                            </ul>
                                        </div>
                                    </form>
                                @endif
                            </td>
                            @endcan 
                            @if(!@Auth::user()->hasRole('Writer'))     
                                <td>
                                @if( $post->owner->phone != NULL )
                                    <button onclick="lista_whatsapp( {{ $post->id }} );"
                                        class="btn btn-success"
                                        title="Enviar Whatapp">
                                    <i class="fa fa-fw fa-whatsapp"></i></button>
                                @endif
                                </td>
                            @endif
                            @if(!@Auth::user()->hasRole('Writer'))
                                <td>
                                    <button class="btn btn-primary btn-block" 
                                                data-toggle="modal" data-target="#user-modal"
                                                data-user="{{ $post->owner->id }}"
                                                data-post="{{ $post->id }}">
                                        {{ $post->owner->name }}
                                    </button>                                    
                                </td>
                            @endif
                            <td>{{ $post->title }}</td>
                            @if(!@Auth::user()->hasRole('Writer'))
                                <td>
                                    @switch( $post->status )
                                        @case('PENDIENTE')
                                            <button type="button"
                                                class="btn btn-xs btn-warning">
                                                {{ $post->status }}</button>
                                            @break
                                        @case('FINALIZADO')
                                            <button type="button"
                                                    class="btn btn-xs btn-success">
                                                    {{ $post->status }}</button>
                                            @break
                                        @case('ENVIADO')
                                            <form method="POST" 
                                                action="{{ route('admin.posts.updateReturn', $post) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button type="submit"
                                                    onclick="return confirm('¿Estas seguro de querer devolver esta OT?')"
                                                    class="btn btn-success"
                                                    title="DEVOLVER">
                                                    <i class="fa fa-fw fa-share-square-o"></i> Devolver
                                                </button>
                                            </form>
                                            @break
                                        @default
                                            <span>Sin estado</span>
                                    @endswitch
                                </td>
                            @endif 
                            <td>
                                <span>
                                    {{  $post->created_at->format('d/m/Y H:i') }}
                                </span>
                            </td>     
                            <td>
                                <span title="{{ isset( $post->started_at ) ? $post->started_at->format('d-m-Y H:i') : '' }}">
                                    {{ isset( $post->started_at ) ? $post->started_at->format('d/m/Y H:i') : '' }}
                                </span>
                            </td>
                            <td>
                                @if( isset($post->client->id) )
                                    <span title="{{ $post->client->name }}">
                                        {{ $post->client->code .'-'. $post->client->title }}
                                    </span>
                                @endif
                            </td>
                            <td>{{ $post->type_other }}</td>
                            <td>{{ isset($post->type->id) ? $post->type->name : '' }}</td>
                            <td>{{ isset($post->problem->id) ? $post->problem->name : '' }}</td>
                            @role('Admin')
                            <td>
                                <!--<a href="{{-- route('productos_pdf', $post) --}}" 
                                    target="_blank" 
                                    class="btn btn-default"
                                ><i class="fa fa-eye"></i></a>--> 
                                <form method="POST" 
                                    action="{{ route('admin.posts.destroy', $post) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar esta publicación?')"
                                        class="btn btn-danger"
                                        title="Eliminar OT"
                                    ><i class="fa fa-fw fa-times"></i></button>
                                </form>
                            </td>
                            @endrole   
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>


    <div class="modal fade" id="whatsapp-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"> <!-- modal-sm -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Envio de Notificación</h4>
                </div>
                
                <div class="modal-body">
                    <div id="gro_whatsapp" class="btn-group-vertical btn-block">
                      
                    </div>                       
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



<div class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document"> <!-- modal-sm -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Cambiar Responsable</h4>
            </div>
            
            <form id="user-form" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                                        
                    <div class="form-group">
                        
                        <label class="col-xs-2 control-label">Nuevo Usuario</label>
                        <div class="col-xs-10">
                            <select id="user_id" 
                                    name="user" 
                                    class="form-control" require>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>                                             
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button id="post_id" name="post_id" type="submit" class="btn btn-primary">Guardar cambio</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    @include('admin.posts.create')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>

        $('#user-modal').on('shown.bs.modal', function(e){
            var user_id = $(e.relatedTarget).data().user;
            var post_id = $(e.relatedTarget).data().post;
            //alert(user_id);
            //alert(post_id)
            document.getElementById("post_id").value = post_id;
            document.getElementById("user_id").value = user_id;
            document.getElementById("user-form").action = "posts/"+post_id+"/user";

            //console.log("abriendo");
        });


        $(function () {



            $('#posts-table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false,
            'pageLength'  : 50,
            });
            
            var overlay = document.getElementsByClassName('overlay');
            while (overlay.length > 0) overlay[0].remove();

            @if (session()->has('code'))
                lista_whatsapp({{ session('code') }})      
            @endif
        })

        function lista_whatsapp(id) {
            var url = "{{ route('admin.posts.view', '/' ) }}"+'/'+id;
            var group = document.getElementById("gro_whatsapp");
            document.getElementById("gro_whatsapp").innerHTML = '';

            axios.get(url).then(function(response){
                //console.log(response.data);
                var total_registro = response.data.post.length;
                if( total_registro > 0){
                    var bandera = false;
                    if( response.data.post[0].owner.phone != null && response.data.post[0].owner.phone != ''){
                        var button = document.createElement("a");
                        button.href = "https://api.whatsapp.com/send?phone="+response.data.post[0].owner.phone+"&text=OT%20"+response.data.post[0].title+"%20Tecnico%20"+response.data.post[0].owner.name.replace(" ", "%20")+"%20Cliente%20"+response.data.post[0].client.name.replace(" ", "%20")+"%20Local%20"+response.data.post[0].client.title.replace(" ", "%20");
                        button.target="_blank";
                        button.classList.add("btn");
                        button.classList.add("btn-block");
                        button.classList.add("btn-success");            
                        button.textContent = response.data.post[0].owner.name;
                        group.appendChild(button);
                        var bandera = true;
                    }
                    if( response.data.post[0].client.phone != null && response.data.post[0].client.phone != ''){
                        var button = document.createElement("a");
                        button.href = "https://api.whatsapp.com/send?phone="+response.data.post[0].client.phone+"&text=OT%20"+response.data.post[0].title+"%20Tecnico%20"+response.data.post[0].owner.name.replace(" ", "%20")+"%20Cliente%20"+response.data.post[0].client.name.replace(" ", "%20")+"%20Local%20"+response.data.post[0].client.title.replace(" ", "%20");
                        button.target="_blank";
                        button.classList.add("btn");
                        button.classList.add("btn-block");
                        button.classList.add("btn-success");            
                        button.textContent = response.data.post[0].client.name;
                        group.appendChild(button);
                        var bandera = true;
                    }
                    if( bandera ){
                        $("#whatsapp-modal").modal("show");
                    }
                }
            })
            .catch(function (error){
                console.log(error);        
            });
        }

        $.extend( true, $.fn.dataTable.defaults, {
            "language": {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoPostFix": "",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "csv": "fichero CSV",
                    "excel": "tabla Excel",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },
                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            }           
        } );    

    </script>

@endpush