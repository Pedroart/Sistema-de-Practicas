@extends('plantilla.tablero')

@section('template_title')
    {{ $matricula->name ?? "{{ __('Show') Matricula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Matricula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('matriculas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Userinstitucional Id:</strong>
                            {{ $matricula->userinstitucional->persona->name }}
                                                {{ $matricula->userinstitucional->persona->apellido_paterno }}
                                                {{ $matricula->userinstitucional->persona->apellido_materno }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $matricula->semestre->name }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $matricula->estado->name }}
                        </div>
                        <div class="form-group">
                            <strong>Ficha Matricula Id:</strong>
                            <a href="{{ asset('storage/'. $matricula->matricula->path) }}" target="_blank">Abrir Archivo</a>
                        </div>
                        <div class="form-group">
                            <strong>Record Academico Id:</strong>
                            <a href="{{ asset('storage/'. $matricula->record->path) }}" target="_blank">Abrir Archivo</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
