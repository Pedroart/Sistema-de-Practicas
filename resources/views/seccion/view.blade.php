@extends('plantilla.tablero')

@section('title')
    {{ __('Sección') }}
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Card superior con información del Profesor y Semestre -->
        <div class="card mb-4">
            <div class="card-header">
                <span class="card-title">{{ __('Información de la Sección') }}</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profesor_codigo">{{ __('Código') }}</label>
                            <p id="profesor_codigo">{{ $seccion->docente->codigo }}</p>
                        </div>
                        <div class="form-group">
                            <label for="profesor_nombre">{{ __('Nombre') }}</label>
                            <p id="profesor_nombre">{{ $seccion->docente?->persona?->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="profesor_apellido">{{ __('Apellido') }}</label>
                            <p id="profesor_apellido">{{ $seccion->docente?->persona?->apellido_paterno}} {{ $seccion->docente?->persona?->apellido_materno}}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="semestre">{{ __('Semestre') }}</label>
                            <p id="semestre">{{ $seccion->semestre->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('Lista de Estudiantes') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Código Institucional</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($estudiantes && $estudiantes->isNotEmpty())
                                        @foreach ($estudiantes as $estudiante)
                                            <tr>
                                                <td>{{ $estudiante->estudiante->codigo }}</td>
                                                <td>{{ $estudiante->estudiante->persona->name }}</td>
                                                <td>{{ $estudiante->estudiante->persona->apellido_paterno }} {{ $estudiante->estudiante->persona->apellido_materno }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">{{ __('No hay estudiantes registrados.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <form method="POST" action="{{ route('patron') }}" role="form" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="seccion_id" value="{{ $seccion->id }}">
                                                    <div class="form-group">
                                                        {{ Form::label('archivo_csv', __('Subir archivo CSV')) }}
                                                        {{ Form::file('archivo', ['class' => 'form-control-file' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
                                                        {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">{{ __('Subir Usuarios') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('Lista de Supervisores') }}</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Código Institucional</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($supervisores && $supervisores->isNotEmpty())

                                        @foreach ($supervisores as $supervisor)
                                            <tr>
                                                <td>{{ $supervisor->supervisor->codigo }}</td>
                                                <td>{{ $supervisor->supervisor->persona?->name }}</td>
                                                <td>{{ $supervisor->supervisor->persona?->apellido_paterno }} {{ $supervisor->supervisor->persona?->apellido_materno }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">{{ __('No hay supervisores registrados.') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <form method="POST" action="{{ route('asignar.supervisores') }}" role="form">
                                                    @csrf
                                                    <input type="hidden" name="seccion_id" value="{{ $seccion->id }}">
                                                    <div class="form-group">
                                                        <label>{{ __('Seleccionar Supervisores') }}</label>
                                                        <div class="form-check">
                                                            @foreach ($lista_supervisores as $supervisor)
                                                                @if (!is_null($supervisor))
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="supervisores[]" value="{{ $supervisor->id }}" id="supervisor-{{ $supervisor->id }}">
                                                                    <label class="form-check-label" for="supervisor-{{ $supervisor->id }}">
                                                                        {{ $supervisor->nombre }} {{ $supervisor->apellido }}
                                                                    </label>
                                                                </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">{{ __('Asignar Supervisores') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
