@extends('plantilla.tablero')

@section('template_title')
    {{ $registro->name ?? "{{ __('Show') Registro de Validación" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} registro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('registros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Userinstitucional Id:</strong>
                            {{ $registro->userinstitucional_id }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre Id:</strong>
                            {{ $registro->semestre_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $registro->estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>registro Id:</strong>
                            <a href="{{ asset('storage/'. $registro->doc1->path) }}" target="_blank">Abrir Archivo</a>
                        </div>
                        <div class="form-group">
                            <strong>Record Id:</strong>
                            <a href="{{ asset('storage/'. $registro->doc2->path) }}" target="_blank">Abrir Archivo</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
