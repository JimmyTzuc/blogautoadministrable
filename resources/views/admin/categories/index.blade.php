@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Categorías</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-danger">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Agregar Categoría</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px"><a href="{{route('admin.categories.edit',$category)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.categories.destroy',$category)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
