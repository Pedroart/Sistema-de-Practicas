@extends('plantilla.tablero')

@section('template_title')
    {{ __('Crear') }} Registro de Validación
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} registro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('registro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
