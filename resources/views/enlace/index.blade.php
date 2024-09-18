@extends('plantilla.tablero')

@section('template_title')
    Enlace
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enlace') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('enlaces.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Etiqueta</th>
										<th>Nombre</th>
										<th>Contenido</th>
										<th>Archivo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enlaces as $enlace)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $enlace->etiqueta }}</td>
											<td>{{ $enlace->Nombre }}</td>
											<td>{{ $enlace->contenido }}</td>
											<td>{{ $enlace->archivo }}</td>

                                            <td>
                                                <form action="{{ route('enlaces.destroy',$enlace->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('enlaces.show',$enlace->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('enlaces.edit',$enlace->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $enlaces->links() !!}
            </div>
        </div>
    </div>
@endsection
