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
                            @foreach ($proceso->etapas as $etapa )
                            <tr>
                                <td>
                                    {{$etapa->tipoetapa->name}}
                                </td>
                                <td>
                                    {{$etapa->estado->name}}
                                </td>
                                <td>
                                    {{$etapa->updated_at}}
                                </td>
                                <td>
                                    <a href="" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </x-card>
            </div>
        </div>
    </div>
@endsection
