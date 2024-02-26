@extends('plantilla.web')

@section('content')
    {!! Form::open(['url' => 'upload-files', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('file', 'Seleccionar Archivo:') !!}
        {!! Form::file('file', ['class' => 'form-control-file']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ruta', 'Seleccionar Ruta:') !!}
        {!! Form::select('ruta', $rutas, null, ['class' => 'form-control', 'placeholder' => 'Seleccionar una ruta']) !!}
    </div>

    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
