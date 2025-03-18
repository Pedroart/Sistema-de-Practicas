@extends('plantilla.tablero')

@section('template_title')
    Validación Docente Supervisor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Validación Docente Supervisor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table id="formulario" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Userinstitucional Id</th>
										<th>Semestre Id</th>
										<th>Estado Id</th>
										<th>Registro Id</th>
										<th>Carga Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registro)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>
                                                {{ $registro->userinstitucional?->persona?->name ?? 'NAN'}}
                                                {{ $registro->userinstitucional?->persona?->apellido_paterno ?? 'NAN'}} 
                                                {{ $registro->userinstitucional?->persona?->apellido_materno ?? 'NAN'}}</p>
                                            </td>
											<td>{{ $registro->semestre->name }}</td>
											<td>{{ $registro->estado->name }}</td>

											<td>{{ $registro->doc1->id }}</td>
											<td>{{ $registro->doc2->id }}</td>

                                            <td>
                                                <form action="{{ route('registros.destroy',$registro->id) }}" method="POST">
                                                    @can('registro.view')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registros.show',$registro->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    @endcan
                                                @if ($registro->estado->id !==3 )
                                                    @can('registro.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('registros.edit',$registro->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('registro.delete')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endcan
                                                @endif
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
