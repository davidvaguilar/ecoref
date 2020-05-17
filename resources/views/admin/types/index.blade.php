@extends('admin.layout')

@section('header')
    <h1>Tipos de Orden</h1>    
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Tipos</h3>
            <button class="btn btn-primary pull-right" 
                data-toggle="modal" 
                data-target="#type-modal"
                data-url="{{ route('admin.types.store') }}">
                <i class="fa fa-fw fa-plus"></i> Nuevo tipo
            </button>
        </div>
        <div class="box-body table-responsive">
            <table id="types-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr> 
                            <td>
                                <button
                                    class="btn btn-info"
                                    data-toggle="modal" 
                                    data-target="#type-modal"
                                    data-id="{{ $type->id }}" 
                                    data-name="{{ $type->name }}"
                                    data-url="{{ route('admin.types.update', $type) }}"
                                ><i class="fa fa-fw fa-pencil"></i></button>
                            </td>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <form method="POST" 
                                    action="{{ route('admin.types.destroy', $type) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este tipo?')"
                                        class="btn btn-danger"
                                    ><i class="fa fa-fw fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@push('scripts')
    @include('admin.types.modal')
@endpush