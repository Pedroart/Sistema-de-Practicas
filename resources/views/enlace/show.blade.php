@extends('plantilla.tablero')

@section('template_title')
    {{ $enlace->name ?? "{{ __('Show') Enlace" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Enlace</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('enlaces.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Etiqueta:</strong>
                            {{ $enlace->etiqueta }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $enlace->Nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Contenido:</strong>
                            {{ $enlace->contenido }}
                        </div>
                        <div class="form-group">
                            <strong>Archivo:</strong>
                            {{ $enlace->archivo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
