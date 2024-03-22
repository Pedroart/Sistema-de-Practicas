<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proceso_id') }}
            {{ Form::text('proceso_id', $archivo->proceso_id, ['class' => 'form-control' . ($errors->has('proceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Proceso Id']) }}
            {!! $errors->first('proceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('model_type') }}
            {{ Form::text('model_type', $archivo->model_type, ['class' => 'form-control' . ($errors->has('model_type') ? ' is-invalid' : ''), 'placeholder' => 'Model Type']) }}
            {!! $errors->first('model_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_model') }}
            {{ Form::text('id_model', $archivo->id_model, ['class' => 'form-control' . ($errors->has('id_model') ? ' is-invalid' : ''), 'placeholder' => 'Id Model']) }}
            {!! $errors->first('id_model', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('etiqueta') }}
            {{ Form::text('etiqueta', $archivo->etiqueta, ['class' => 'form-control' . ($errors->has('etiqueta') ? ' is-invalid' : ''), 'placeholder' => 'Etiqueta']) }}
            {!! $errors->first('etiqueta', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>