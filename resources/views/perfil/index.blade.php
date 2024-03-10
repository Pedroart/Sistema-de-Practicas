@extends('plantilla.tablero')

@section('content')
    <div class="row">
        <div class="col-md-6">

            <x-card title="Institucional">
                <div class="form-group">
                    {{ Form::label('codigo') }}
                    {{ Form::text('codigo', $user->userinstitucional->codigo ?? null, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'codigo', 'disabled']) }}
                    {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <x-ubieduform id="{{$user->userinstitucional->escuela_id ?? 1}}" bloqueado='TRUE' />
            </x-card>
        </div>

        <div class="col-md-6">

            <x-card title="Informacion Personal">
                <div class="form-group">
                    {{ Form::label('dni') }}
                    {{ Form::text('dni', $user->userinstitucional->persona->dni ?? 'Ingresa Dato', ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'DNI', 'disabled']) }}
                    {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('nombre', $user->userinstitucional->persona->name ?? 'Ingresa Dato', ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'disabled']) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>



                <div class="form-group">
                    {{ Form::label('apellido_paterno') }}
                    {{ Form::text('apellido_paterno', $user->userinstitucional->persona->apellido_paterno ?? 'Ingresa Dato', ['class' => 'form-control' . ($errors->has('apellido_paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno', 'disabled']) }}
                    {!! $errors->first('apellido_paterno', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('apellido_materno') }}
                    {{ Form::text('apellido_materno', $user->userinstitucional->persona->apellido_materno ?? 'Ingresa Dato', ['class' => 'form-control' . ($errors->has('apellido_materno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno', 'disabled']) }}
                    {!! $errors->first('apellido_materno', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <x-ubigeo-form id="{{$user->userinstitucional->persona->ubidistrito_id ?? null }}" bloqueado='TRUE' />

                    <a class="btn btn-sm btn-success"
                    href="{{ route('perfil.edit',1) }}"><i
                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
            </x-card>

        </div>
    </div>
@endsection
