@extends('plantilla.tablero')

@section('title')
    Secciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Secciones') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('secciones.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Crear Nueva') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="formulario" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Profesor</th>
                                        <th>Semestre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secciones as $seccion)
                                        <tr>

                                            <td>{{ $seccion->id }}</td>
                                            <td>
                                            <p id="profesor_apellido">
                                                {{ $seccion->docente?->persona?->name ?? 'NAN'}}
                                                {{ $seccion->docente?->persona?->apellido_paterno ?? 'NAN'}} 
                                                {{ $seccion->docente?->persona?->apellido_materno ?? 'NAN'}}</p>
                                            </td>
                                            <td>{{ $seccion->semestre->name }}</td>
                                            <td>
                                                <form action="{{ route('secciones.destroy', $seccion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('secciones.show', $seccion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Personas') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('secciones.edit', $seccion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Grupos') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url("/") }}/tablero/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url("/") }}/tablero/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url("/") }}/tablero/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection


@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('/') }}/tablero/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/tablero/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#formulario").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "colvis"]
            }).buttons().container().appendTo('#formulario_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
