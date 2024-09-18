@extends('plantilla.tablero')

@section('template_title')
    {{ $etapa->name ?? "{{ __('Show') Etapa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Etapa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('etapas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Proceso Id:</strong>
                            {{ $etapa->proceso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoetapas Id:</strong>
                            {{ $etapa->tipoetapas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $etapa->estado_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
