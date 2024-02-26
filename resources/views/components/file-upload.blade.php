<div class="form-group">
    {{ Form::label('Archivo') }}
    {{ Form::file('archivo', ['class' => 'form-control-file' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
    {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
</div>  

<div class="form-group">
    {{ Form::label('rutafile_id') }}
    {{ Form::select('rutafile_id', $select->pluck('name','id') , $ruta, ['class' => 'form-control' . ($errors->has('rutafile_id') ? ' is-invalid' : ''), 'placeholder' => 'Rutafile Id']) }}
    {!! $errors->first('rutafile_id', '<div class="invalid-feedback">:message</div>') !!}
</div>