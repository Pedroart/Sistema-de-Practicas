<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('docente_id') }}
            {{ Form::select('docente_id',$docentes, $proceso->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'docente Id']) }}
            {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estudiante_id') }}
            {{ Form::select('estudiante_id',$listadoInstitucional, $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id','readonly'=>'readonly']) }}
            {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semestre_id') }}
            {{ Form::select('semestre_id', $semestre,$proceso->semestre_id, ['class' => 'form-control' . ($errors->has('semestre_id') ? ' is-invalid' : ''), 'placeholder' => 'Semestre Id','readonly'=>'readonly']) }}
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::select('estado_id', $estados,$proceso->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo Proceso') }}
            {{ Form::select('tipoproceso_id',$tipoprocesos, $proceso->tipoproceso_id, ['class' => 'form-control' . ($errors->has('tipoproceso_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipoproceso Id','readonly'=>'readonly']) }}
            {!! $errors->first('tipoproceso_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
