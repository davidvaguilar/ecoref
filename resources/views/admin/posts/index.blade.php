@extends('admin.layout')

@section('header')
    <h1>
        Orden de Trabajo
        <!--<small>Listado</small>-->
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Trabajos</li>
    </ol>
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
                        <th>Folio</th>
                        <th>Fecha Creacion</th>
                        <th>Cliente</th>
                        <th>Tipo de Orden</th>
                        <th>Problema</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr> 
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if( isset($post->client->id) )
                                <button type="button"
                                    class="btn btn-xs btn-danger">
                                    {{ $post->client->name }}</button>
                                @endif
                            </td>
                            <td>{{ isset($post->type->id) ? $post->type->name : '' }}</td>
                            <td>{{ isset($post->problem->id) ? $post->problem->name : '' }}</td>
                            <td>
                                <a href="{{ route('productos_pdf', $post) }}" 
                                    target="_blank" 
                                    class="btn btn-xs btn-default"
                                ><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.posts.edit', $post) }}" 
                                    class="btn btn-xs btn-info"
                                ><i class="fa fa-pencil"></i></a>
                                <form method="POST" 
                                    action="{{ route('admin.posts.destroy', $post) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar esta publicación?')"
                                        class="btn btn-xs btn-danger"
                                    ><i class="fa fa-times"></i></button>
                                </form>
                                <button type="submit"
                                        onclick="return confirm('¿Estas seguro de querer volver a enviar este reporte?')"
                                        class="btn btn-xs btn-success"
                                    ><i class="fa fa-envelope-o"></i></button>
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
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })

        
    </script>

@endpush