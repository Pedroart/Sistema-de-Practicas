@extends('plantilla.tablero')

@section('template_title')
    {{ $modelador->name ?? "{{ __('Show') Modelador" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Modelador</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('modeladors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Indicador:</strong>
                            {{ $modelador->indicador }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoproceso Id:</strong>
                            {{ $modelador->tipoproceso_id }}
                        </div>
                        <div class="form-group">
                            <strong>Model Type:</strong>
                            {{ $modelador->model_type }}
                        </div>
                        <div class="form-group">
                            <strong>Json Data:</strong>
                            {{ $modelador->json_data }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
