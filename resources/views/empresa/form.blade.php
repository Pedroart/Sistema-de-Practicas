<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ruc') }}
            {{ Form::text('ruc', $empresa->ruc, ['class' => 'form-control' . ($errors->has('ruc') ? ' is-invalid' : ''), 'placeholder' => 'Ruc']) }}
            {!! $errors->first('ruc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('razon_social') }}
            {{ Form::text('razon_social', $empresa->razon_social, ['class' => 'form-control' . ($errors->has('razon_social') ? ' is-invalid' : ''), 'placeholder' => 'Razon Social']) }}
            {!! $errors->first('razon_social', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $empresa->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubidistrito_id') }}
            {{ Form::text('ubidistrito_id', $empresa->ubidistrito_id, ['class' => 'form-control' . ($errors->has('ubidistrito_id') ? ' is-invalid' : ''), 'placeholder' => 'Ubidistrito Id']) }}
            {!! $errors->first('ubidistrito_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>