@extends('plantilla.tablero')



@section('content')
<x-ClassFormComponent :modo="'view'" :tipoproceso="'2'" :global="['proceso'=>'1']" />
@endsection
