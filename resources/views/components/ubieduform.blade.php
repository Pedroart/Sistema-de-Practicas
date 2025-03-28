<div class="form-group">
    {{ Form::label('Facultad') }}
    {{ Form::select($prefijo.'facultad', $lista_facultad, $indi_facultad, ['id'=>'facultad','class' => 'form-control' . ($errors->has('facultad') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una facultad', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('facultad', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Departamento') }}
    {{ Form::select($prefijo.'departamento', $lista_departamento, $indi_departamento, ['id'=>'departamento','class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un departamento', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Escuela') }}
    {{ Form::select($prefijo.'escuela_id', $lista_escuela, $indi_escuela, ['id'=>'escuela','class' => 'form-control' . ($errors->has('escuela_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una escuela', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('escuela_id', '<div class="invalid-feedback">:message</div>') !!}
</div>
