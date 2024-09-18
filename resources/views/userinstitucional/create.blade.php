@extends('plantilla.tablero')

@section('template_title')
    {{ __('Crear') }} Userinstitucional
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Userinstitucional</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('userinstitucionals.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('userinstitucional.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
