@extends('plantilla.tablero')

@section('template_title')
    {{ $proceso->name ?? "{{ __('Mostrar') Proceso" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Proceso</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ url()->previous() }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Docente Titular Id:</strong>
                            {{ $proceso->docente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estudiante Id:</strong>
                            {{ $proceso->estudiante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre Id:</strong>
                            {{ $proceso->semestre_id }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $proceso->estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoproceso Id:</strong>
                            {{ $proceso->tipoproceso_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-card :title="'Etapas'">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Etapa</th>
                                <th>Estado</th>
                                <th>Fecha Actualizacion</th>
                                <th>Más</th>
                            </tr>
                        </thead>
                        <tbody>

                        @for ($i = 0; $i < count($etapas); $i++)
                            <tr>
                                <td>
                                    {{ $etapas[$i]->tipoetapa->name }}
                                </td>
                                <td>
                                    @if($etapas[$i]->estado_id !== 5)
                                        {{ $etapas[$i]->estado->name }}
                                    @endif
                                </td>
                                <td>
                                    {{$etapas[$i]->updated_at}}
                                </td>
                                <td>

                                    @if ($etapas[$i]->estado_id !==5 )
                                        <a href="{{ route('procesos.conf',['id'=>$proceso->id,'etapa'=>$etapas[$i]->tipoetapas_id,'metodo'=>'show']) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endfor



                        </tbody>
                    </table>
                </x-card>
            </div>
        </div>
    </section>
@endsection
