@extends('plantilla.tablero')

@section('template_title')
    Proceso
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <x-card :title='$proceso->tipoproceso->name'>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{ $proceso->tipoproceso->descripcion }}</div>
                        <div>
                            Profesor: {{$proceso->docente->codigo ?? 'No Asignado'}}
                            <br>
                            Actualizado: {{ $proceso->updated_at }}
                        </div>
                        <div>{{ $proceso->estado->name }}</div>
                    </div>
                </x-card>
            </div>
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

                                </td>
                                <td>
                                    @if (($i == 0 && $etapas[$i]->estado_id == 5) || ($i > 0 && $etapas[$i - 1]->estado_id ==3))
                                        <a href="{{ route('proceso.conf',['nombre'=>$proceso->tipoproceso->name,'etapa'=>$etapas[$i]->tipoetapas_id,'metodo'=>'create']) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    @endif
                                    @if ($etapas[$i]->estado_id == 2 )
                                        <a href="{{ route('proceso.conf',['nombre'=>$proceso->tipoproceso->name,'etapa'=>$etapas[$i]->tipoetapas_id,'metodo'=>'edit']) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    @endif
                                    @if ($etapas[$i]->estado_id > 1 && $etapas[$i]->estado_id < 5 )
                                        <a href="{{ route('proceso.conf',['nombre'=>$proceso->tipoproceso->name,'etapa'=>$etapas[$i]->tipoetapas_id,'metodo'=>'show']) }}" class="btn btn-sm btn-info">
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
    </div>
@endsection
