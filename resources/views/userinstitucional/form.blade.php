<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $userinstitucional->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $userinstitucional->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('personas_id') }}
            {{ Form::text('personas_id', $userinstitucional->personas_id, ['class' => 'form-control' . ($errors->has('personas_id') ? ' is-invalid' : ''), 'placeholder' => 'Personas Id']) }}
            {!! $errors->first('personas_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('escuela_id') }}
            {{ Form::text('escuela_id', $userinstitucional->escuela_id, ['class' => 'form-control' . ($errors->has('escuela_id') ? ' is-invalid' : ''), 'placeholder' => 'Escuela Id']) }}
            {!! $errors->first('escuela_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>