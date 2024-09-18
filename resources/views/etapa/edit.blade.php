@extends('plantilla.tablero')

@section('template_title')
    {{ __('Update') }} Etapa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Etapa</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('etapas.update', $etapa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('etapa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
