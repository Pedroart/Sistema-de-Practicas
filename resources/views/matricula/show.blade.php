@extends('plantilla.tablero')

@section('template_title')
    {{ $matricula->name ?? "{{ __('Show') Matricula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Matricula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('matriculas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Userinstitucional Id:</strong>
                            {{ $matricula->userinstitucional_id }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre Id:</strong>
                            {{ $matricula->semestre_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $matricula->estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario Id:</strong>
                            {{ $matricula->comentario_id }}
                        </div>
                        <div class="form-group">
                            <strong>Matricula Id:</strong>
                            {{ $matricula->matricula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Record Id:</strong>
                            {{ $matricula->record_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
