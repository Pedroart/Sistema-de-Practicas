@extends('plantilla.tablero')

@section('template_title')
    {{ $persona->name ?? "{{ __('Mostrar') Persona" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('personas.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $persona->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $persona->apellido_materno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $persona->apellido_paterno }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $persona->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Ubidistrito Id:</strong>
                            {{ $persona->ubidistrito_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
