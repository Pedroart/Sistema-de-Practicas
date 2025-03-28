@extends('plantilla.tablero')

@section('template_title')
    {{ __('Actualizar') }} Modelador
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Modelador</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modeladors.update', $modelador->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('modelador.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
