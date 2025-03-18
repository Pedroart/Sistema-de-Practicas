@extends('plantilla.tablero')

@section('title')
    {{ __('Organización de Estudiantes') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Lista de Estudiantes Libres -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{ __('Estudiantes Libres') }}</span>
                    </div>
                    <div class="card-body">
                        <ul id="estudiantes-libres" class="list-group">
                            @foreach ($estudiantes as $estudiante)
                                @if (!$estudiante->grupo_id) <!-- Mostrar solo estudiantes sin grupo -->
                                    <li class="list-group-item" draggable="true" data-id="{{ $estudiante->id }}">
                                        {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Grupos con Profesores -->

            <div class="col-sm-8">
                <form id="form-grupos" method="POST" action="{{ route('secciones.grupos', $seccion->id) }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">{{ __('Grupos con Profesores') }}</span>
                        </div>
                        <div class="card-body">
                            <div id="grupos" class="row">
                                @foreach ($grupos as $grupo)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="card grupo" data-id="{{ $grupo->id }}">
                                            <div class="card-header">
                                                <span class="card-title">{{ $grupo->nombre_profesor }}</span>
                                            </div>
                                            <div class="card-body grupo-body" data-id="{{ $grupo->id }}">
                                                <!-- Los estudiantes asignados se mostrarán aquí -->
                                                @foreach ($estudiantes as $estudiante)
                                                    @if ($estudiante->grupo_id == $grupo->id)
                                                        <div class="student-card" data-id="{{ $estudiante->id }}">
                                                            {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                                                            @if($estudiantes_sin_grupo != 0)
                                                            <button class="btn btn-sm btn-danger float-right remove-student">Eliminar</button>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if($estudiantes_sin_grupo != 0)
                        <div class="box-footer mt20">
                            <button type="button" id="submit-grupos" class="btn btn-primary mb-2 mx-2">{{ __('Registrar') }}</button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="http://127.0.0.1:8000/tablero/plugins/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para hacer que los estudiantes sean arrastrables
            function makeItemsDraggable() {
                $('#estudiantes-libres .list-group-item').on('dragstart', function(event) {
                    event.originalEvent.dataTransfer.setData('text/plain', $(this).data('id'));
                    $(this).addClass('dragging');
                }).on('dragend', function() {
                    $(this).removeClass('dragging');
                });
            }

            // Inicializar los eventos dragstart
            makeItemsDraggable();

            // Hacer que los grupos sean áreas de soltado
            $('#grupos .grupo-body').on('dragover', function(event) {
                event.preventDefault();
                $(this).addClass('drag-over');
            }).on('dragleave', function() {
                $(this).removeClass('drag-over');
            }).on('drop', function(event) {
                event.preventDefault();
                $(this).removeClass('drag-over');

                let estudianteId = event.originalEvent.dataTransfer.getData('text/plain');
                let estudiante = $('#estudiantes-libres').find(`.list-group-item[data-id="${estudianteId}"]`);

                if (estudiante.length) {
                    // Mover el estudiante al grupo
                    let estudianteHTML = estudiante.html();
                    let estudianteDataId = estudiante.data('id');
                    estudiante.remove();
                    $(this).append(`<div class="student-card" data-id="${estudianteDataId}">
                        ${estudianteHTML} <button class="btn btn-sm btn-danger float-right remove-student">Eliminar</button>
                    </div>`);
                }
            });

            // Permitir que los estudiantes se muevan de vuelta a la lista de estudiantes libres
            $('#grupos').on('click', '.remove-student', function() {
                let estudianteCard = $(this).closest('.student-card');
                let estudianteId = estudianteCard.data('id');
                let estudianteHTML = estudianteCard.html().replace(/<button.*<\/button>/, ''); // Remove button from HTML
                estudianteCard.remove();
                $('#estudiantes-libres').append(`<li class="list-group-item" draggable="true" data-id="${estudianteId}">
                    ${estudianteHTML}
                </li>`);
                // Reasignar eventos dragstart a los elementos nuevos
                makeItemsDraggable();
            });

            // Evento para enviar la información cuando se presiona "Submit"
            $('#submit-grupos').on('click', function() {
                let gruposData = [];

                // Recorrer todos los grupos y recoger los estudiantes en cada uno
                $('#grupos .grupo').each(function() {
                    let grupoId = $(this).data('id');
                    let estudiantes = [];

                    $(this).find('.student-card').each(function() {
                        estudiantes.push($(this).data('id'));
                    });

                    gruposData.push({
                        grupo_id: grupoId,
                        estudiantes: estudiantes
                    });
                });

                // Crear un input hidden para enviar los datos de grupos
                $('<input>').attr({
                    type: 'hidden',
                    name: 'grupos',
                    value: JSON.stringify(gruposData)
                }).appendTo('#form-grupos');

                // Enviar el formulario
                $('#form-grupos').submit();
            });
        });
    </script>

    <style>
        .dragging {
            opacity: 0.5;
        }
        .drag-over {
            border: 2px dashed #007bff;
            background-color: #f0f8ff;
        }
        .list-group-item {
            cursor: move;
        }
        .student-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .remove-student {
            cursor: pointer;
        }
    </style>
@endsection
