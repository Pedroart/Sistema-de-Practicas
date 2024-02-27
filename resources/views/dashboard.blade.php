@extends('plantilla.tablero')



@section('content')
    <x-card title="Institucional">
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', 'Hola', ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <x-ubieduform/>
    </x-card>
    <x-card title="Informacion Personal">

    </x-card>
@endsection
