@extends('plantilla.tablero')

@section('template_title')
|{{ $file->name ?? "{{ __('Mostrar') File" }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrar') }} File</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('files.index') }}"> {{ __('Regresar') }}</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Path:</strong>
                        {{ $file->path }}


                    </div>
                    <div class="form-group">
                        <strong>Rutafile Id:</strong>
                        {{ $file->rutafile->name }}
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('storage/'.$file->path) }}" target="_blank">Abrir Archivo</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
