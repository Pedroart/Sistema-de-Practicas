@extends('plantilla.tablero')

@section('template_title')
    {{ $semestre->name ?? "{{ __('Mostrar') Semestre" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Semestre</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('semestres.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $semestre->name }}
                        </div>
                        <div class="form-group">
                            <strong>Vigencia:</strong>
                            {{ $semestre->vigencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
