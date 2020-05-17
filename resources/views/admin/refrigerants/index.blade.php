@extends('admin.layout')

@section('header')
    <h1>Refrigerantes</h1>  
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Refrigerantes</h3>
            <button class="btn btn-primary pull-right" 
                data-toggle="modal" 
                data-target="#refrigerant-modal"
                data-url="{{ route('admin.refrigerants.store') }}">
                <i class="fa fa-fw fa-plus"></i> Nuevo refrigerante
            </button>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($refrigerants as $refrigerant)
                        <tr> 
                            <td>
                                <button
                                    class="btn btn-info"
                                    data-toggle="modal" 
                                    data-target="#refrigerant-modal"
                                    data-id="{{ $refrigerant->id }}" 
                                    data-name="{{ $refrigerant->name }}"
                                    data-url="{{ route('admin.refrigerants.update', $refrigerant) }}"
                                ><i class="fa fa-fw fa-pencil"></i></button>
                            </td>
                            <td>{{ $refrigerant->id }}</td>
                            <td>{{ $refrigerant->name }}</td>
                            <td>
                                <form method="POST" 
                                    action="{{ route('admin.refrigerants.destroy', $refrigerant) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este refrigerante?')"
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
    @include('admin.refrigerants.modal')
@endpush