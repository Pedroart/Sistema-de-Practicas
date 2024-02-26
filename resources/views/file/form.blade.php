<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('path', 'Archivo') }}
            {{ Form::file('archivo', ['class' => 'form-control-file' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
            {!! $errors->first('archivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--
        <div class="form-group">
            {{ Form::label('path') }}
            {{ Form::text('path', $file->path, ['class' => 'form-control' . ($errors->has('path') ? ' is-invalid' : ''), 'placeholder' => 'Path']) }}
            {!! $errors->first('path', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        -->
        <div class="form-group">
            {{ Form::label('rutafile_id') }}
            {{ Form::text('rutafile_id', $file->rutafile_id, ['class' => 'form-control' . ($errors->has('rutafile_id') ? ' is-invalid' : ''), 'placeholder' => 'Rutafile Id']) }}
            {!! $errors->first('rutafile_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
