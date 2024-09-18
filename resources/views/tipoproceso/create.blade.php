@extends('plantilla.tablero')

@section('template_title')
    {{ __('Crear') }} Tipoproceso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Tipoproceso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipoprocesos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('tipoproceso.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
