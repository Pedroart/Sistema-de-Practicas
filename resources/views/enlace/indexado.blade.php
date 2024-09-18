@extends('plantilla.tablero')

@section('template_title')
    Enlace
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($groupedEnlaces as $etiqueta => $items)
                <x-card title="{{ $etiqueta }}">
                    <dl class="row">
                        @foreach ($items as $item)
                            <dt class="col-sm-4">{{ $item->Nombre }}</dt>
                            <dd class="col-sm-4">{{ $item->contenido }}</dd>
                            <dd class="col-sm-4"><x-file-view id="{{$item->archivo}}" /></dd>

                        @endforeach
                    </dl>
                </x-card>
                @endforeach
        </div>
    </div>
@endsection
