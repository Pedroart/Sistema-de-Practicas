<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('docente_id') }}
            {{ Form::select('docente_id',$docentes, $proceso->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'docente Id']) }}
            {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado_id') }}
            {{ Form::select('estado_id', $estados,$proceso->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado Id']) }}
            {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <x-card title="Asignacion de Estudiantes">
            <div class="form-group">
                {{ Form::label('Estudiante 1') }}
                {{ Form::select('estudiante_asig_1',$listadoInstitucional, $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id',]) }}
                {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Estudiante 2') }}
                {{ Form::select('estudiante_asig_1',$listadoInstitucional, $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id',]) }}
                {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Estudiante 3') }}
                {{ Form::select('estudiante_asig_1',$listadoInstitucional, $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id',]) }}
                {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('Estudiante 4') }}
                {{ Form::select('estudiante_asig_1',$listadoInstitucional, $proceso->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id',]) }}
                {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </x-card>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>




