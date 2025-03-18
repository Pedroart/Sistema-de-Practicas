@extends('plantilla.tablero')

@section('template_title')
    Proceso
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Proceso') }}
                </span>

                    <div class="float-right">
                    <a href="{{ route('procesos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                        {{ __('Registrar Nuevo') }}
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

                <table id="formulario" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>

                            <th>Docente Titular</th>
                            <th>Docente Supervisor</th>
                            <th>Estudiante</th>
                            <th>Semestre</th>
                            <th>Estado</th>
                            <th>Tipoproceso</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procesos as $proceso)
                            <tr>

                                <td>{{ $proceso->id }}</td>
                                <td>{{ $proceso->docente->persona->name ?? 'NAN' }}
                                    {{ $proceso->docente->persona->apellido_paterno ?? 'NAN' }}
                                    {{ $proceso->docente->persona->apellido_materno ?? 'NAN' }}
                                </td>
                                <td>{{ $proceso->estudiante->persona->name ?? 'Sin codigo' }}
                                    {{ $proceso->estudiante->persona->apellido_paterno ?? 'NAN' }}
                                    {{ $proceso->estudiante->persona->apellido_materno ?? 'NAN' }}
                                </td>
                                <td>
                                    @php
                                        $userInstitucional = app('App\Models\Userinstitucional')::find($proceso->archivo?->id_model);
                                    @endphp
                                    {{ $userInstitucional?->persona->name ?? 'NAN' }}
                                    {{ $userInstitucional?->persona->apellido_paterno ?? 'NAN' }}
                                    {{ $userInstitucional?->persona->apellido_materno ?? 'NAN' }}
                                </td>
                                <td>{{ $proceso->semestre->name }}</td>
                                <td>{{ $proceso->estado->name }}</td>
                                <td>{{ $proceso->tipoproceso->name }}</td>

                                <td>
                                    <form action="{{ route('procesos.destroy',$proceso->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('procesos.show',$proceso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('procesos.edit',$proceso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            $("#formulario").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "colvis"]
            }).buttons().container().appendTo('#formulario_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
