@extends('plantilla.tablero')

@section('template_title')
    {{ __('Crear') }} Comentario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Comentario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comentarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('comentario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
