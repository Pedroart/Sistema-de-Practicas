<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Traits\Upload; // import the trait
use Illuminate\Http\Request;

class FilesController extends Controller
{
    use Upload; // add this trait

    public function index()
    {
        return view('web.bolsa_trabajo');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $this->UploadFile($request->file('file'), $request->ruta); // use the method in the trait
            File::create([
                'path' => $path,
            ]);

            return redirect()->route('files.index')->with('success', 'File Uploaded Successfully');
        }
    }
}
