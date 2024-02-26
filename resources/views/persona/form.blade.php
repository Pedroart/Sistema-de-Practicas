<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $persona->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_materno') }}
            {{ Form::text('apellido_materno', $persona->apellido_materno, ['class' => 'form-control' . ($errors->has('apellido_materno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
            {!! $errors->first('apellido_materno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido_paterno') }}
            {{ Form::text('apellido_paterno', $persona->apellido_paterno, ['class' => 'form-control' . ($errors->has('apellido_paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
            {!! $errors->first('apellido_paterno', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dni') }}
            {{ Form::text('dni', $persona->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubidistrito_id') }}
            {{ Form::text('ubidistrito_id', $persona->ubidistrito_id, ['class' => 'form-control' . ($errors->has('ubidistrito_id') ? ' is-invalid' : ''), 'placeholder' => 'Ubidistrito Id']) }}
            {!! $errors->first('ubidistrito_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>