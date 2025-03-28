@extends('plantilla.tablero')

@section('template_title')
    Archivo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Archivo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('archivos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Proceso Id</th>
										<th>Model Type</th>
										<th>Id Model</th>
										<th>Etiqueta</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archivos as $archivo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $archivo->proceso_id }}</td>
											<td>{{ $archivo->model_type }}</td>
											<td>{{ $archivo->id_model }}</td>
											<td>{{ $archivo->etiqueta }}</td>

                                            <td>
                                                <form action="{{ route('archivos.destroy',$archivo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('archivos.show',$archivo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('archivos.edit',$archivo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $archivos->links() !!}
            </div>
        </div>
    </div>
@endsection
