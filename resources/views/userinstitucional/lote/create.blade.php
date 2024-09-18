@extends('plantilla.tablero')

@section('template_title')
    Lista Usuarios Creados
@endsection

@section('content')
<x-card>
    <table id="formulario" class="table table-bordered table-striped">
        {{$role}}

    </table>
</x-card>
@endsection
