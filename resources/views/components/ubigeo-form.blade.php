<div class="form-group">
    {{ Form::label('Departamento') }}
    {{ Form::select('departamento', [], null, ['id'=>"UbiDepartamento",'class' => 'form-control' . ($errors->has('departamento') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un departamento']) }}
    {!! $errors->first('departamento', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Provincia') }}
    {{ Form::select('provincia', [], null, ['id'=>"UbiProvincia",'class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una provincia']) }}
    {!! $errors->first('provincia', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Distrito') }}
    {{ Form::select('distrito', [], null, ['id'=>"UbiDistrito",'class' => 'form-control' . ($errors->has('distrito') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un distrito']) }}
    {!! $errors->first('distrito', '<div class="invalid-feedback">:message</div>') !!}
</div>
