@extends('plantilla.tablero')



@section('content')
<x-card>
    <x-ClassFormComponent :clase="App\models\empresa::class" :modo="'edit'" />
</x-card>

@endsection
