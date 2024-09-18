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
                            <table class="table table-striped table-hover">
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

											<td>{{ $registro->userinstitucional->codigo }}</td>
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
                {!! $registros->links() !!}
            </div>
        </div>
    </div>
@endsection
