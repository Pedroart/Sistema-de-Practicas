@extends('plantilla.tablero')

@section('template_title')
    {{ __('Actualizar') }} Semestre
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Semestre</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('semestres.update', $semestre->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('semestre.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
