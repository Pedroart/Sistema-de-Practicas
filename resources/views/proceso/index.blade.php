@extends('plantilla.tablero')

@section('template_title')
    Proceso
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proceso') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('procesos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Profesor Id</th>
										<th>Estudiante Id</th>
										<th>Semestre Id</th>
										<th>Estado Id</th>
										<th>Tipoproceso Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($procesos as $proceso)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proceso->profesor_id }}</td>
											<td>{{ $proceso->estudiante_id }}</td>
											<td>{{ $proceso->semestre_id }}</td>
											<td>{{ $proceso->estado_id }}</td>
											<td>{{ $proceso->tipoproceso_id }}</td>

                                            <td>
                                                <form action="{{ route('procesos.destroy',$proceso->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('procesos.show',$proceso->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('procesos.edit',$proceso->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $procesos->links() !!}
            </div>
        </div>
    </div>
@endsection
