
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
                                {{ Form::hidden($data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar]) }}
                                @break
                            @case('text')
                                {{ Form::label($data->desplegar) }}
                                {{ Form::text($data->atributo, $data->valor , ['class' => 'form-control' . ($errors->has($data->atributo) ? ' is-invalid' : ''), 'placeholder' => $data->desplegar]) }}
                                @break
                            @case('ubiedu')
                                <x-ubieduform id="{{1}}" bloqueado="{{TRUE}}" />
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

