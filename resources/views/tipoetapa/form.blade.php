<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $tipoetapa->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoproceso_id') }}
            {{ Form::text('tipoproceso_id', $tipoetapa->tipoproceso_id, ['class' => 'form-control' . ($errors->has('tipoproceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipoproceso Id']) }}
            {!! $errors->first('tipoproceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
