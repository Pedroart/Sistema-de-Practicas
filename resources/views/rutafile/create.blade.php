@extends('plantilla.tablero')

@section('title')
    {{ __('Create') }} Rutafile
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Rutafile</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rutafiles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('rutafile.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
