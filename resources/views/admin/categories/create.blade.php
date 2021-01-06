@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!} 
                    {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Ingrese el nombre de la categoría']) !!}


                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div> 
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!} 
                    {!! Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Ingrese el slug de la categoría','readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror 
                </div>

                {!! Form::submit('Crear categoría', ['']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
