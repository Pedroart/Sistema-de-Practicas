
<div class="row">

    @foreach ($items as $Grupo => $item)

            @if ($Grupo !== 'hidden')
                <div class="col-sm-6">
                    <x-card title="{{$Grupo}}">
            @endif
                        @foreach ($item as $data)


                        <div class="form-group">
                            @switch($data->tipo)
                                @case('hidden')
                                    {{ Form::hidden($Grupo.$data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar, $bloqueado ? ' disabled' : '']) }}
                                    @break
                                @case('text')
                                    {{ Form::label($data->desplegar) }}
                                    {{ Form::text($Grupo.$data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar, $bloqueado ? ' disabled' : '']) }}
                                    @break
                                @case('ubiedu')
                                    <x-ubieduform id="{{$data->valor ?: 1}}" bloqueado="{{$bloqueado}}" />
                                    @break

                            @endswitch
                        </div>

                        @endforeach
            @if ($Grupo !== 'hidden')
                    </x-card>
                </div>
            @endif

    @endforeach
</div>

