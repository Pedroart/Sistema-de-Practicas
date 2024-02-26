@extends('plantilla.tablero')

@section('title')
    {{ __('Update') }} Rutafile
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Rutafile</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('rutafiles.update', $rutafile->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('rutafile.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
