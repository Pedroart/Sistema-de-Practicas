@extends('plantilla.tablero')

@section('template_title')
    {{ __('Crear') }} File
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} File</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('files.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('file.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
