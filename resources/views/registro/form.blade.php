<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('semestre_id') }}
            {{ Form::text('semestre_id', $registro->semestre->id, ['class' => 'form-control' . ($errors->has('semestre_id') ? ' is-invalid' : ''), 'placeholder' => 'Semestre Id', 'READONLY']) }}
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('userinstitucional_id') }}
            {{ Form::select('userinstitucional_id',$listadoInstitucional ,$user->userinstitucional->id ?? null, ['class' => 'form-control' . ($errors->has('userinstitucional_id') ? ' is-invalid' : ''), 'placeholder' => 'Userinstitucional Id', $user->hasRole('estudiante') ? 'READONLY' : ''  ]) }}
            {!! $errors->first('userinstitucional_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!--<div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::text('estado_id', $registro->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario_id') }}
            {{ Form::text('comentario_id', $registro->comentario_id, ['class' => 'form-control' . ($errors->has('comentario_id') ? ' is-invalid' : ''), 'placeholder' => 'Comentario Id']) }}
            {!! $errors->first('comentario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>-->
        <div class="form-group">
            {{ Form::label('Registro de Supervicion') }}
            {{ Form::file('doc1_id', $registro->doc1_id, ['class' => 'form-control' . ($errors->has('doc1_id') ? ' is-invalid' : ''), 'placeholder' => 'registro Id']) }}
            {!! $errors->first('doc1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Carga No electiva') }}
            {{ Form::file('doc2_id', $registro->doc2_id, ['class' => 'form-control' . ($errors->has('doc2_id') ? ' is-invalid' : ''), 'placeholder' => 'Record Id']) }}
            {!! $errors->first('doc2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
    </div>
</div>
