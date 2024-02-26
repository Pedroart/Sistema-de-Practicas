@extends('plantilla.tablero')

@section('template_title')
    {{ $tipoetapa->name ?? "{{ __('Show') Tipoetapa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipoetapa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipoetapas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $tipoetapa->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoproceso Id:</strong>
                            {{ $tipoetapa->tipoproceso_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
