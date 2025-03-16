<?php

namespace App\Http\Controllers;

use App\Models\Rutafile;
use Illuminate\Http\Request;

/**
 * Class RutafileController
 */
class RutafileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutafiles = Rutafile::paginate();

        return view('rutafile.index', compact('rutafiles'))
            ->with('i', (request()->input('page', 1) - 1) * $rutafiles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutafile = new Rutafile();

        return view('rutafile.create', compact('rutafile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rutafile::$rules);

        $rutafile = Rutafile::create($request->all());

        return redirect()->route('rutafiles.index')
            ->with('success', 'Rutafile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rutafile = Rutafile::find($id);

        return view('rutafile.show', compact('rutafile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutafile = Rutafile::find($id);

        return view('rutafile.edit', compact('rutafile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rutafile $rutafile)
    {
        request()->validate(Rutafile::$rules);

        $rutafile->update($request->all());

        return redirect()->route('rutafiles.index')
            ->with('success', 'Rutafile updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rutafile = Rutafile::find($id)->delete();

        return redirect()->route('rutafiles.index')
            ->with('success', 'Rutafile deleted successfully');
    }
}
