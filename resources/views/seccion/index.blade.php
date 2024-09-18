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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Semestre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secciones as $seccion)
                                        <tr>

                                            <td>{{ $seccion->id }}</td>
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
