@extends('plantilla.tablero')

@section('template_title')
    Userinstitucional
@endsection

@section('content')
    <x-card title='Ingreos de Usuarios en Lote'>

        <form method="POST" action="{{ route('userinstitucionalslote.store') }}"  role="form" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                {{ Form::label('archivo_csv') }}
                {{ Form::file('archivo', ['class' => 'form-control-file' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
                {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('Rol') }}
                {{ Form::select('Rol', $roles, null, ['class' => 'form-control' . ($errors->has('Rol') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona una opción']) }}
                {!! $errors->first('Rol', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-check">
                {{ Form::checkbox('conformidad', '1', null, ['class' => 'form-check-input' . ($errors->has('conformidad') ? ' is-invalid' : '')]) }}
                {{ Form::label('conformidad', 'Quiero realizar el proceso', ['class' => 'form-check-label']) }}
                {!! $errors->first('conformidad', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            {{ Form::submit('Enviar', ['class' => 'btn btn-primary']) }}

        </form>







    </x-card>
@endsection
