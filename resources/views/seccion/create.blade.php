@extends('plantilla.tablero')

@section('title')
    {{ __('Crear') }} Sección
@endsection

@section('content')

    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Sección</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('secciones.store') }}" role="form">
                            @csrf

                            <div class="form-group">
                                {{ Form::label('Profesor') }}
                                {{ Form::select('docente_id',$profesores, null, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'docente']) }}
                                {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</div>') !!}

                            </div>

                            <div class="form-group">
                                {{ Form::label('Semestre') }}
                                {{ Form::select('semestre_id',$semestres, null, ['class' => 'form-control' . ($errors->has('semestre_id') ? ' is-invalid' : ''), 'placeholder' => 'semestre']) }}
                                {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
