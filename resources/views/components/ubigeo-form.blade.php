<div class="form-group">
    {{ Form::label('Departamento') }}
    {{ Form::select('departamento', $lista_departamento, $indi_departamento, ['id' => 'UbiDepartamento', 'class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un departamento', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Provincia') }}
    {{ Form::select('provincia', $lista_provincia, $indi_provincia, ['id' => 'UbiProvincia', 'class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una provincia', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('provincia', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Distrito') }}
    {{ Form::select('distrito', $lista_distrito, $indi_distrito, ['id' => 'UbiDistrito', 'class' => 'form-control' . ($errors->has('distrito') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un distrito', $bloqueado ? ' disabled' : '']) }}
    {!! $errors->first('distrito', '<div class="invalid-feedback">:message</div>') !!}
</div>
