@extends('plantilla.tablero')

@section('template_title')
    {{ __('Create') }} Proceso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Proceso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('procesos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('proceso.estudiante.create_form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection