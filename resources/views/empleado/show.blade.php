@extends('plantilla.tablero')

@section('template_title')
    {{ $empleado->name ?? "{{ __('Show') Empleado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empresa Id:</strong>
                            {{ $empleado->empresa_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $empleado->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $empleado->apellido_paterno }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $empleado->apellido_materno }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $empleado->genero }}
                        </div>
                        <div class="form-group">
                            <strong>Grado Instruccion:</strong>
                            {{ $empleado->grado_instruccion }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $empleado->cargo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
