<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('profesor_id') }}
            {{ Form::text('profesor_id', $proceso->profesor_id, ['class' => 'form-control' . ($errors->has('profesor_id') ? ' is-invalid' : ''), 'placeholder' => 'Profesor Id']) }}
            {!! $errors->first('profesor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estudiante_id') }}
            {{ Form::text('estudiante_id', $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id']) }}
            {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semestre_id') }}
            {{ Form::text('semestre_id', $proceso->semestre_id, ['class' => 'form-control' . ($errors->has('semestre_id') ? ' is-invalid' : ''), 'placeholder' => 'Semestre Id']) }}
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::text('estado_id', $proceso->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoproceso_id') }}
            {{ Form::text('tipoproceso_id', $proceso->tipoproceso_id, ['class' => 'form-control' . ($errors->has('tipoproceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipoproceso Id']) }}
            {!! $errors->first('tipoproceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>