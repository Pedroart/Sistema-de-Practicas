@extends('plantilla.tablero')

@section('template_title')
    Datos Estudiante
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class=""></i>
                    Empresa
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if($empresa)
                    <!-- Mostrar información de la empresa si está disponible -->
                    <div class="form-group">
                        <label for="RUC">RUC</label>
                        <input id="RUC" class="form-control" placeholder="RUC" required name="empresa#ruc" type="text" value="{{ $empresa->ruc }}">
                    </div>

                    <div class="form-group">
                        <label for="RazonSocial">Razon Social</label>
                        <input id="RazonSocial" class="form-control" placeholder="Razon Social" required name="empresa#razon_social" type="text" value="{{ $empresa->razon_social }}">
                    </div>

                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input id="Direccion" class="form-control" placeholder="Direccion" required name="empresa#direccion" type="text" value="{{ $empresa->direccion }}">
                    </div>

                    <div class="form-group">
                        <label for="Departamento">Departamento</label>
                        <select id="UbiDepartamento" class="form-control" name="empresa#departamento">
                            <option value="">Seleccione un departamento</option>
                            <!-- Options should be dynamically populated -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Provincia">Provincia</label>
                        <select id="UbiProvincia" class="form-control" name="empresa#provincia">
                            <option value="">Seleccione una provincia</option>
                            <!-- Options should be dynamically populated -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Distrito">Distrito</label>
                        <select id="UbiDistrito" class="form-control" name="empresa#ubidistrito_id">
                            <option value="">Seleccione un distrito</option>
                            <!-- Options should be dynamically populated -->
                        </select>
                    </div>
                @else
                    <p class="text-warning">Información no brindada</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class=""></i>
                    Jefe Directo
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if($jefe_directo)
                    <!-- Mostrar información del jefe directo si está disponible -->
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input id="Nombre" class="form-control" placeholder="Nombre" required name="jefe_directo#name" type="text" value="{{ $jefe_directo->name }}">
                    </div>

                    <div class="form-group">
                        <label for="ApellidoPaterno">Apellido Paterno</label>
                        <input id="ApellidoPaterno" class="form-control" placeholder="Apellido Paterno" required name="jefe_directo#apellido_paterno" type="text" value="{{ $jefe_directo->apellido_paterno }}">
                    </div>

                    <div class="form-group">
                        <label for="ApellidoMaterno">Apellido Materno</label>
                        <input id="ApellidoMaterno" class="form-control" placeholder="Apellido Materno" required name="jefe_directo#apellido_materno" type="text" value="{{ $jefe_directo->apellido_materno }}">
                    </div>

                    <div class="form-group">
                        <label for="Cargo">Cargo</label>
                        <input id="Cargo" class="form-control" placeholder="Cargo" required name="jefe_directo#cargo" type="text" value="{{ $jefe_directo->cargo }}">
                    </div>

                    <div class="form-group">
                        <label for="Genero">Genero</label>
                        <select id="Genero" class="form-control" required name="jefe_directo#genero">
                            <option value="">Genero</option>
                            <option value="1" {{ $jefe_directo->genero == '1' ? 'selected' : '' }}>Masculino</option>
                            <option value="2" {{ $jefe_directo->genero == '2' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="GradoInstruccion">Grado de Instrucción</label>
                        <input id="GradoInstruccion" class="form-control" placeholder="Grado de Instrucción" required name="jefe_directo#grado_instruccion" type="text" value="{{ $jefe_directo->grado_instruccion }}">
                    </div>
                @else
                    <p class="text-warning">Información no brindada</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
