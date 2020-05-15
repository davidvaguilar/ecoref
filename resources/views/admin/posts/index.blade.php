@extends('admin.layout')

@section('header')
    <h1>Ordenes de Trabajo</h1>    
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Ordenes</h3>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Crear reporte
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Folio</th>
                        <th>Fecha Creacion</th>
                        <th>Cliente</th>
                        <th>Local</th>
                        <th>Tipo de Orden</th>
                        <th>Problema</th>
                        <th style="min-width:170px">Archivos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                @can('update', $post)
                                    <a href="{{ route('admin.posts.edit', $post) }}" 
                                        class="btn btn-info"
                                    ><i class="fa fa-pencil"></i></a>
                                @endcan
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->started_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @if( isset($post->client->id) )
                                    {{ $post->client->name }}
                                @endif
                            </td>
                            <td>
                                @if( isset($post->client->id) )
                                <button type="button"
                                    class="btn btn-xs btn-danger">
                                    {{ $post->client->title }}</button>
                                @endif
                            </td>
                            <td>{{ isset($post->type->id) ? $post->type->name : '' }}</td>
                            <td>{{ isset($post->problem->id) ? $post->problem->name : '' }}</td>
                            <td>
                                <!--<a href="{{ route('productos_pdf', $post) }}" 
                                    target="_blank" 
                                    class="btn btn-default"
                                ><i class="fa fa-eye"></i></a>-->
                                
                                @can('delete', $post)
                                    <form method="POST" 
                                        action="{{ route('admin.posts.destroy', $post) }}" 
                                        style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" 
                                            onclick="return confirm('¿Estas seguro de querer eliminar esta publicación?')"
                                            class="btn btn-danger"
                                        ><i class="fa fa-times"></i></button>
                                    </form>
                                @endcan

                                @if( $post->records->count() )
                                    @foreach ($post->records as $record)
                                        <a href="{{ url($record->url) }}" 
                                            title="Creacion: {{ $record->created_at}}"
                                            target="_blank" 
                                            class="btn btn-default"
                                        ><i class="fa fa-file-pdf-o"></i></a>
                                    @endforeach
                                    <form method="POST" 
                                        action="{{ route('admin.posts.updateSend', $post) }}" 
                                        style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit"
                                            onclick="return confirm('¿Estas seguro de querer volver a enviar este reporte?')"
                                            class="btn btn-success"
                                        ><i class="fa fa-envelope-o"></i></button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>

        <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
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