@extends('plantilla.tablero')

@section('template_title')
    Matricula
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Matricula') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('matriculas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Userinstitucional Id</th>
										<th>Semestre Id</th>
										<th>Estado Id</th>
										<th>Matricula Id</th>
										<th>Record Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriculas as $matricula)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $matricula->userinstitucional->codigo }}</td>
											<td>{{ $matricula->semestre->name }}</td>
											<td>{{ $matricula->estado->name }}</td>

											<td>{{ $matricula->matricula_id }}</td>
											<td>{{ $matricula->record_id }}</td>

                                            <td>
                                                <form action="{{ route('matriculas.destroy',$matricula->id) }}" method="POST">
                                                    @can('matricula.view')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('matriculas.show',$matricula->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    @endcan

                                                    @can('matricula.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('matriculas.edit',$matricula->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endcan
                                                    @can('matricula.delete')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $matriculas->links() !!}
            </div>
        </div>
    </div>
@endsection
