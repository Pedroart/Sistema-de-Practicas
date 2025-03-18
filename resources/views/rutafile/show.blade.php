@extends('plantilla.tablero')

@section('title')
    {{ $rutafile->name ?? "{{ __('Mostrar') Rutafile" }}
@endsection


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Ruta de Archivo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rutafiles.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $rutafile->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
