<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proceso_id') }}
            {{ Form::text('proceso_id', $etapa->proceso_id, ['class' => 'form-control' . ($errors->has('proceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Proceso Id']) }}
            {!! $errors->first('proceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoetapas_id') }}
            {{ Form::text('tipoetapas_id', $etapa->tipoetapas_id, ['class' => 'form-control' . ($errors->has('tipoetapas_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipoetapas Id']) }}
            {!! $errors->first('tipoetapas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::text('estado_id', $etapa->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>