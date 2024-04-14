@extends('plantilla.tablero')



@section('content')
<div class="input-group mb-3">

    <div class="custom-file">
        <label class="custom-file-label" for="inputGroupFile01">Seleccionar el archivo</label>
        {{ Form::file('archivo', ['class' => 'form-control-file custom-file-input' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
    </div>

</div>
<div class="input-group mb-3">
    {{ Form::text( "name" ,"Archivo-js.com", ['class' => 'form-control' . ($errors->has('1') ? ' is-invalid' : '')]) }}
    <div class="input-group-append">
      <a class="btn btn-outline-secondary" type="button" id="button-addon2">Abrir Archivo</a>
    </div>
  </div>
@endsection
