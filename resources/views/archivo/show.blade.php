@extends('plantilla.tablero')

@section('template_title')
    {{ $archivo->name ?? "{{ __('Mostrar') Archivo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Archivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('archivos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Proceso Id:</strong>
                            {{ $archivo->proceso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Model Type:</strong>
                            {{ $archivo->model_type }}
                        </div>
                        <div class="form-group">
                            <strong>Id Model:</strong>
                            {{ $archivo->id_model }}
                        </div>
                        <div class="form-group">
                            <strong>Etiqueta:</strong>
                            {{ $archivo->etiqueta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
