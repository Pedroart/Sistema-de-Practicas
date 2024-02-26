<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Traits\Upload; //import the trait
use Illuminate\Http\Request;

/**
 * Class FileController
 * @package App\Http\Controllers
 */
class FileController extends Controller
{
    use Upload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate();

        return view('file.index', compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * $files->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file = new File();
        return view('file.create', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(File::$rules);


        if ($request->hasFile('archivo')) {

            $path = $this->UploadFile($request->file('archivo'), $request->rutafile_id);//use the method in the trait
            $request['path'] = $path;
            $file = File::create($request->all());
        }

        return redirect()->route('files.index')
            ->with('success', 'File created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('file.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);

        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  File $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        request()->validate(File::$rules);
        #$file->update($request->all());

        if ($request->hasFile('archivo')) {
            //check if the existing file is present and delete it from the storage
            if (!is_null($file->path)) {
                $this->deleteFile($file->path);
            }
            //upload the new file
            $path = $this->UploadFile($request->file('archivo'), $request->rutafile_id);
        }
        $file->update(['path' => $path]);
        
        return redirect()->route('files.index')
            ->with('success', 'File updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $file = File::find($id);
        if (!is_null($file->path)) {
            $this->deleteFile($file->path);
        }
        $file->delete();
        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully');
    }
}
