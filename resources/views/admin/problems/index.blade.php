@extends('admin.layout')

@section('header')
    <h1>Problemas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de Problemas</h3>
            <button class="btn btn-primary pull-right" 
                data-toggle="modal" 
                data-target="#problem-modal"
                data-url="{{ route('admin.problems.store') }}">
                <i class="fa fa-fw fa-plus"></i> Nuevo problema
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
                    @foreach($problems as $problem)
                        <tr> 
                            <td>
                                <button
                                    class="btn btn-info"
                                    data-toggle="modal" 
                                    data-target="#problem-modal"
                                    data-id="{{ $problem->id }}" 
                                    data-name="{{ $problem->name }}"
                                    data-url="{{ route('admin.problems.update', $problem) }}"
                                ><i class="fa fa-fw fa-pencil"></i></button>
                            </td>
                            <td>{{ $problem->id }}</td>
                            <td>{{ $problem->name }}</td>
                            <td>
                                <form method="POST" 
                                    action="{{ route('admin.problems.destroy', $problem) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este problema?')"
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
    @include('admin.problems.modal')
@endpush