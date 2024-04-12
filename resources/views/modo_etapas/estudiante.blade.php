@extends('plantilla.tablero')

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
            @includeif('partials.errors')
            @if($metodo!=='show')
            <form method="POST" action="{{ route('proceso.'.$metodo , ['tipoproceso'=>$Etapas->tipoetapas_id]) }}"  role="form" enctype="multipart/form-data">
            @else
            <form role="form" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ $metodo }} - {{ $Etapas->tipoetapa->name}}</span>
                        @if( $metodo !== "show" )
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">{{ __('Continuar') }}</button>
                        </div>
                        @endif
                    </div>
                </div>
                <x-ClassFormComponent :modo="$metodo" :tipoproceso="$Etapas->tipoetapas_id" :global="['proceso'=>$Etapas->proceso_id,'etapa'=>$Etapas->id]" />
            </form>
        </div>
    </div>
</section>

@endsection
