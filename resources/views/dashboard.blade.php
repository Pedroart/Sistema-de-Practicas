@extends('plantilla.tablero')



@section('content')
<x-card>
    <x-ClassFormComponent :tipoproceso="'2'" :global="['proceso'=>'1']" />
</x-card>

@endsection
