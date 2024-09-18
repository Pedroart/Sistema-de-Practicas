@extends('plantilla.tablero')

@section('template_title')
    Userinstitucional
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Userinstitucional') }}
                </span>

                <div class="float-right">
                    <a href="{{ route('userinstitucionalslote.index') }}" class="btn btn-primary btn-sm float-right"
                        data-placement="left">
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
                        <th>Rol</th>

                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Personas Id</th>
                        <th>Escuela Id</th>

                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userinstitucionals as $userinstitucional)
                        <tr>
                            <td>{{ $userinstitucional->user->roles[0]->name }}</td>

                            <td>{{ $userinstitucional->codigo }}</td>
                            <td>{{ $userinstitucional->persona?->name }}
                                {{ $userinstitucional->persona?->apellido_paterno }}</td>
                            <td>{{ $userinstitucional->personas_id }}</td>
                            <td>{{ $userinstitucional->escuela->nombre }}</td>

                            <td>
                                <form action="{{ route('userinstitucionals.destroy', $userinstitucional->id) }}"
                                    method="POST">
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('userinstitucionals.show', $userinstitucional->id) }}"><i
                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('userinstitucionals.edit', $userinstitucional->id) }}"><i
                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                        {{ __('Eliminar') }}</button>
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
            // Inicializa DataTable
            var table = $("#formulario").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "colvis"]
            });

            // Agrega inputs de búsqueda a cada columna
            $('#formulario thead tr').clone(true).appendTo('#formulario thead');
            $('#formulario thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                if (title !== 'Botones') { // No agregar input de filtro a la columna de botones
                    $(this).html('<input type="text" placeholder="Filtrar ' + title + '" style="width: 100%;"/>');

                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                } else {
                    $(this).html(''); // Dejar la columna de botones sin input
                }
            });

            // Coloca los botones en la posición adecuada
            table.buttons().container().appendTo('#formulario_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
