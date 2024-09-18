@extends('plantilla.tablero')

@section('template_title')
    {{ __('Update') }} Proceso
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Proceso</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('procesos.save_titular', $proceso->id) }}"  role="form" enctype="multipart/form-data">

                            @csrf

                            @include('proceso.form_titular')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
