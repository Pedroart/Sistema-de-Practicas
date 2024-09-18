@extends('plantilla.tablero')

@section('content')
<section class="content container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-8">

            @includeif('partials.errors')
            <form method="POST" action="{{ route('eestado', ['id_etapa'=>$Etapas->id]) }}"  role="form" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ $metodo }} - {{ $Etapas->tipoetapa->name}}</span>

                        <div class="float-right">
                            {{ Form::select("estado_id", $estados, $Etapas->estado_id, ['id'=>'estado_id','class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una estado']) }}
                            <button type="submit" class="btn btn-primary mt-3">
                                Continuar
                            </button>
                        </div>

                    </div>
                </div>
            </form>
            <x-ClassFormComponent :modo="$metodo" :tipoproceso="$Etapas->tipoetapas_id" :global="['proceso'=>$Etapas->proceso_id,'etapa'=>$Etapas->id]" />
        </div>
    </div>
</section>

@endsection
