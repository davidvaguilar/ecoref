@extends('admin.layout')

@section('header')
    <h1>Clientes</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Clientes</h3>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#client-modal">
                <i class="fa fa-plus"></i> Crear nuevo cliente
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="clients-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id Local</th>
                        <th>Empresa</th>                        
                        <th>Local</th>                        
                        <th>Direccion</th>                   
                        <th>Ciudad</th>
                        <th>Nombre.Email</th>
                        <th style="min-width:80px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr> 
                            <td>{{ $client->code }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->title }}</td>
                            <td>{{ $client->adress }}</td>
                            <td>{{ $client->city }}</td>
                            <td>{{ $client->city }}</td>
                            <td>
                                <a href="{{ route('admin.clients.edit', $client) }}" 
                                    class="btn btn-info"
                                ><i class="fa fa-pencil"></i></a>
                                <form method="POST" 
                                    action="{{ route('admin.clients.destroy', $client) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este cliente?')"
                                        class="btn btn-danger"
                                    ><i class="fa fa-times"></i></button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
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

    @include('admin.clients.create')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#clients-table').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
            })
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