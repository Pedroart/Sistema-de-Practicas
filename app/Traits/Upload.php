<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Upload
{
    public function UploadFile(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $FileName = ! is_null($filename) ? $filename : $file->getClientOriginalName() . Str::random(10);

        return $file->storeAs(
            $folder,
            $FileName . '.' . $file->getClientOriginalExtension(),
            $disk
        );
    }

    public function deleteFile($path, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }
}
