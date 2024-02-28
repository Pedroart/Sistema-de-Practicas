<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('semestre_id') }}
            {{ Form::text('semestre_id', $matricula->semestre->name, ['class' => 'form-control' . ($errors->has('semestre_id') ? ' is-invalid' : ''), 'placeholder' => 'Semestre Id', 'disabled']) }}
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!--<div class="form-group">
            {{ Form::label('userinstitucional_id') }}
            {{ Form::text('userinstitucional_id', $matricula->userinstitucional_id, ['class' => 'form-control' . ($errors->has('userinstitucional_id') ? ' is-invalid' : ''), 'placeholder' => 'Userinstitucional Id']) }}
            {!! $errors->first('userinstitucional_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::text('estado_id', $matricula->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario_id') }}
            {{ Form::text('comentario_id', $matricula->comentario_id, ['class' => 'form-control' . ($errors->has('comentario_id') ? ' is-invalid' : ''), 'placeholder' => 'Comentario Id']) }}
            {!! $errors->first('comentario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>-->
        <div class="form-group">
            {{ Form::label('matricula_id') }}
            {{ Form::file('matricula_id', $matricula->matricula_id, ['class' => 'form-control' . ($errors->has('matricula_id') ? ' is-invalid' : ''), 'placeholder' => 'Matricula Id']) }}
            {!! $errors->first('matricula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('record_id') }}
            {{ Form::file('record_id', $matricula->record_id, ['class' => 'form-control' . ($errors->has('record_id') ? ' is-invalid' : ''), 'placeholder' => 'Record Id']) }}
            {!! $errors->first('record_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
