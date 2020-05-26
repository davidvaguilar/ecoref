@extends('admin.layout')

@section('header')
    <h1>Ordenes de Trabajo</h1>    
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Ordenes</h3>
            @can('create', new App\Post)
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Crear reporte
                </button>
            @endcan
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
                        @role('Admin')
                            <th>Responsable</th>
                        @endrole
                        <th>Folio</th> 
                        @role('Admin')
                            <th>Estado</th>
                        @endrole
                        <th>Fecha Creacion</th>
                        <th>Cliente</th>
                        <th>Local</th>
                        <th>Tipo de Orden</th>
                        <th>Problema</th>
                        @can('delete', $posts->first())<th></th>@endcan 
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
                                                class="btn btn-success"
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
                            @role('Admin')  
                                <td>{{ $post->owner->name }}</td>
                            @endrole
                            <td>{{ $post->title }}</td>
                            @role('Admin')
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
                                            <button type="button"
                                                    class="btn btn-xs btn-success">
                                                    {{ $post->status }}</button>
                                            @break
                                        @default
                                            <span>Sin estado</span>
                                    @endswitch
                                </td>
                            @endrole      
                            <td><span title="{{ $post->started_at->format('d-m-Y H:i') }}">{{ $post->started_at->diffForHumans() }}</span></td>
                            <td>
                                @if( isset($post->client->id) )
                                    {{ $post->client->name }}
                                @endif
                            </td>
                            <td>
                                @if( isset($post->client->id) )
                                    {{ $post->client->code }} - {{ $post->client->title }}
                                @endif
                            </td>
                            <td>{{ isset($post->type->id) ? $post->type->name : '' }}</td>
                            <td>{{ isset($post->problem->id) ? $post->problem->name : '' }}</td>
                            @can('delete', $post)
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
                            @endcan 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
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
        $(function () {

            $('#posts-table').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
            });
            
            var overlay = document.getElementsByClassName('overlay');
            while (overlay.length > 0) overlay[0].remove();
        })

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