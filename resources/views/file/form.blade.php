

<div class="box box-info padding-1">
    <div class="box-body">
        <x-file-upload :ruta="optional($file->rutafile)->id" />
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
