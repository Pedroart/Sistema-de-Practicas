@extends('plantilla.tablero')



@section('content')
<x-ClassFormComponent :modo="'view'" :tipoproceso="'1'" :global="['proceso'=>'1']" />
@endsection
