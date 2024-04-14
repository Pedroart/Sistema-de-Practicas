
<div class="row justify-content-center">

    @foreach ($items as $Grupo => $item)

            @if ($Grupo !== 'hidden')
                <div class="col-sm-6">
                    <x-card title="{{$Grupo}}">

                        @foreach ($item as $data)


                        <div class="form-group">
                            @switch($data->tipo)
                                @case('hidden')
                                    {{ Form::hidden( $data->etiqueta_modelo . '#'.$data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar]) }}
                                    @break
                                @case('text')
                                    {{ Form::label($data->desplegar,"$data->desplegar") }}
                                    {{ Form::text($data->etiqueta_modelo.'#'.$data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar, $bloqueado ? ' disabled' : '']) }}
                                    @break
                                @case('selector')
                                    {{ Form::label($data->desplegar) }}
                                    {{ Form::select($data->etiqueta_modelo.'#'.$data->atributo,$data->list, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar, $bloqueado ? ' disabled' : '']) }}
                                    @break
                                @case('ubiedu')
                                    <x-ubieduform id="{{$data->valor ?: 1}}" bloqueado="{{$bloqueado}}" prefijo="{{$data->etiqueta_modelo.'#'}}"/>
                                    @break
                                @case('ubigeo')
                                    <x-ubigeo-form id="{{$data->valor ?: null}}" bloqueado="{{$bloqueado}}" prefijo="{{$data->etiqueta_modelo.'#'}}"/>
                                    @break
                                @case('file')
                                    @if(!$bloqueado)
                                        <div class="input-group mb-3">

                                            <div class="custom-file">
                                                <label class="custom-file-label" for="inputGroupFile01">Seleccionar el archivo</label>
                                                {{ Form::file('archivo', ['class' => 'form-control-file custom-file-input' . ($errors->has('archivo') ? ' is-invalid' : '')]) }}
                                            </div>

                                        </div>
                                    @else
                                        <div class="input-group mb-3">
                                            {{ Form::text( "name" ,"Archivo-js.com", ['class' => 'form-control' . ($errors->has('1') ? ' is-invalid' : '')]) }}
                                            <div class="input-group-append">
                                            <a class="btn btn-outline-secondary" type="button" id="button-addon2">Abrir Archivo</a>
                                            </div>
                                        </div>
                                    @endif
                                    @break
                            @endswitch
                        </div>

                        @endforeach

                    </x-card>
                </div>
            @else
            <div>
                @foreach ($item as $data)


                        <div class="form-group">
                            @switch($data->tipo)
                                @case('hidden')
                                    {{ Form::hidden($data->etiqueta_modelo.'#'.$data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar]) }}
                                    @break
                            @endswitch
                        </div>

                        @endforeach
            </div>

            @endif


    @endforeach
</div>

{{-- Form::file('proceso#image') --}}
