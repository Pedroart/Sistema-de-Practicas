
@foreach ($propiedades as $key => $valor)
    @if($valor['modo'][$modo] === $role || $valor['modo'][$modo] === 'all')
    <div class="form-group">

        @switch($valor['type'])
            @case('text')
                {{ Form::label($valor['name']) }}
                {{ Form::text($key, null , ['class' => 'form-control' . ($errors->has($key) ? ' is-invalid' : ''), 'placeholder' => $valor['name'], ($valor['modo'][$modo] === $role)? '':'readonly', ($modo === 'view')? 'readonly':'' ])  }}
                @break
            @case('email')
                {{ Form::label($valor['name']) }}
                {{ Form::email($key, null , ['class' => 'form-control' . ($errors->has($key) ? ' is-invalid' : ''), 'placeholder' => $valor['name'], ($valor['modo'][$modo] === $role)? '':'readonly']) }}
            @case('file')
                {{ Form::label($valor['name']) }}
                {{ Form::file($key, null , ['class' => 'form-control' . ($errors->has($key) ? ' is-invalid' : ''), 'placeholder' => $valor['name'], ($valor['modo'][$modo] === $role)? '':'readonly']) }}
            @case('select')
                {{ Form::label($valor['name']) }}
                {{ Form::select($key, null , ['class' => 'form-control' . ($errors->has($key) ? ' is-invalid' : ''), 'placeholder' => $valor['name'], ($valor['modo'][$modo] === $role)? '':'readonly']) }}
            @case('number')
                {{ Form::label($valor['name']) }}
                {{ Form::number($key, null , ['class' => 'form-control' . ($errors->has($key) ? ' is-invalid' : ''), 'placeholder' => $valor['name'], ($valor['modo'][$modo] === $role)? '':'readonly']) }}
            @case('ubidistrito')
                <x-ubieduform id="{{1}}" bloqueado="{{($valor['modo'][$modo] === $role)? FALSE:TRUE}}" />
                @break
            @default

        @endswitch

        {!! $errors->first($key, '<div class="invalid-feedback">:message</div>') !!}
    </div>
    @endif
@endforeach
