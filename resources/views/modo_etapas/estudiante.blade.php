@extends('plantilla.tablero')

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            @includeif('partials.errors')
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ $metodo }} - {{ $Etapas->tipoetapa->name}}</span>
                    @if( $metodo !== "show" )
                    <div class="float-right">
                        <a href="{{ route('matriculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                          {{ __('Continuar') }}
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            <form method="POST" action="{{ route('dashboard') }}"  role="form" enctype="multipart/form-data">
                @csrf
                <x-ClassFormComponent :modo="$metodo" :tipoproceso="$Etapas->tipoetapas_id" :global="['proceso'=>$Etapas->proceso_id]" />
            </form>
        </div>
    </div>
</section>

@endsection
