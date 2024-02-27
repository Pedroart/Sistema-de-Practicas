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
                    <a href="{{ route('userinstitucionals.create') }}" class="btn btn-primary btn-sm float-right"
                        data-placement="left">
                        {{ __('Create New') }}
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

                        <th>Codigo</th>
                        <th>User Id</th>
                        <th>Personas Id</th>
                        <th>Escuela Id</th>

                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userinstitucionals as $userinstitucional)
                        <tr>
                            <td>{{ $userinstitucional->id }}</td>

                            <td>{{ $userinstitucional->codigo }}</td>
                            <td>{{ $userinstitucional->user_id }}</td>
                            <td>{{ $userinstitucional->personas_id }}</td>
                            <td>{{ $userinstitucional->escuela_id }}</td>

                            <td>
                                <form action="{{ route('userinstitucionals.destroy', $userinstitucional->id) }}"
                                    method="POST">
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('userinstitucionals.show', $userinstitucional->id) }}"><i
                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('userinstitucionals.edit', $userinstitucional->id) }}"><i
                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                        {{ __('Delete') }}</button>
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
            $("#formulario").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["excel", "colvis"]
            }).buttons().container().appendTo('#formulario_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
