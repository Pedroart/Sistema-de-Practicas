
@json($retorno)

@foreach ($items as $Grupo => $item)
    <x-card>
    @foreach ($item as $atributo => $data)
        <div class="form-group">
            @switch($data->type)
                @case('hidden')
                    {{ Form::hidden($atributo, $data->value , ['class' => 'form-control' . ($errors->has($atributo) ? ' is-invalid' : ''), 'placeholder' => $data->display]) }}
                @break
            @endswitch
        </div>
    @endforeach
    </x-card>
@endforeach
