@extends('admin.layout')

@section('header')
    <h1>
        Usuarios
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Usuarios</li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de usuarios</h3>
            @can('create', $users->first())
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Crear usuario
                </a>
            @endcan
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr> 
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>                            
                            <td>{{ $user->getRoleDisplayName() }}</td> <!--<td>{{ $user->getRoleNames()->implode(', ') }}</td>-->
                            <td>
                            @can('view', $user)
                                <a href="{{ route('admin.users.show', $user) }}" 
                                    class="btn btn-default">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan
                            @can('update', $user)
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                    class="btn btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button"
                                        data-toggle="modal" data-target="#signature-modal"
                                        class="btn btn-info">
                                    <i class="fa fa-file"></i></button>
                            @endcan
                            @can('delete', $user)
                                <form method="POST" 
                                    action="{{ route('admin.users.destroy', $user) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')"
                                        class="btn btn-danger"
                                    ><i class="fa fa-times"></i></button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="modal fade" id="signature-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Agregar Firmar</h4>
                </div>
                <form method="post" action="{{ route('admin.users.signature', $user) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="inputPassword3" class="control-label">Subir Firma</label>
                        <input type="file" name="signature" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Subir firma</button>
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
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : false
            })
        })
    </script>

@endpush