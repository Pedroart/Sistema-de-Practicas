@extends('plantilla.tablero')

@section('template_title')
    {{ $userinstitucional->name ?? "{{ __('Show') Userinstitucional" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Userinstitucional</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('userinstitucionals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Codigo:</strong>
                            {{ $userinstitucional->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userinstitucional->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Personas Id:</strong>
                            {{ $userinstitucional->personas_id }}
                        </div>
                        <div class="form-group">
                            <strong>Escuela Id:</strong>
                            {{ $userinstitucional->escuela->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
