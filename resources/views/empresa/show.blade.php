@extends('plantilla.tablero')

@section('template_title')
    {{ $empresa->name ?? "{{ __('Show') Empresa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Empresa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ruc:</strong>
                            {{ $empresa->ruc }}
                        </div>
                        <div class="form-group">
                            <strong>Razon Social:</strong>
                            {{ $empresa->razon_social }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $empresa->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Ubidistrito Id:</strong>
                            {{ $empresa->ubidistrito_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
