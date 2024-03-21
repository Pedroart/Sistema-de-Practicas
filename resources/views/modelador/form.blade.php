<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('indicador') }}
            {{ Form::text('indicador', $modelador->indicador, ['class' => 'form-control' . ($errors->has('indicador') ? ' is-invalid' : ''), 'placeholder' => 'Indicador']) }}
            {!! $errors->first('indicador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoproceso_id') }}
            {{ Form::text('tipoproceso_id', $modelador->tipoproceso_id, ['class' => 'form-control' . ($errors->has('tipoproceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipoproceso Id']) }}
            {!! $errors->first('tipoproceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('model_type') }}
            {{ Form::text('model_type', $modelador->model_type, ['class' => 'form-control' . ($errors->has('model_type') ? ' is-invalid' : ''), 'placeholder' => 'Model Type']) }}
            {!! $errors->first('model_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('json_data') }}
            {{ Form::text('json_data', $modelador->json_data, ['class' => 'form-control' . ($errors->has('json_data') ? ' is-invalid' : ''), 'placeholder' => 'Json Data']) }}
            {!! $errors->first('json_data', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>