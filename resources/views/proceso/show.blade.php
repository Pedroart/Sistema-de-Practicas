@extends('plantilla.tablero')

@section('template_title')
    {{ $proceso->name ?? "{{ __('Show') Proceso" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('procesos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>docente Id:</strong>
                            {{ $proceso->docente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estudiante Id:</strong>
                            {{ $proceso->estudiante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre Id:</strong>
                            {{ $proceso->semestre_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $proceso->estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoproceso Id:</strong>
                            {{ $proceso->tipoproceso_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
