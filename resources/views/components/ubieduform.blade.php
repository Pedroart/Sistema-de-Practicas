<div class="form-group">
    {{ Form::label('Facultad') }}
    {{ Form::select('facultad', $lista_facultad, $indi_facultad, ['id'=>'facultad','class' => 'form-control' . ($errors->has('facultad') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una facultad']) }}
    {!! $errors->first('facultad', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Departamento') }}
    {{ Form::select('departamento', $lista_departamento, $indi_departamento, ['id'=>'departamento','class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un departamento']) }}
    {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Escuela') }}
    {{ Form::select('escuela', $lista_escuela, $indi_escuela, ['id'=>'escuela','class' => 'form-control' . ($errors->has('escuela') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una escuela']) }}
    {!! $errors->first('escuela', '<div class="invalid-feedback">:message</div>') !!}
</div>
