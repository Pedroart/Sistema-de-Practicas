<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * Class EnlaceController
 * @package App\Http\Controllers
 */
class EnlaceController extends Controller
{

    public function indexado()
    {
        $enlaces = Enlace::all();
        $groupedEnlaces = $enlaces->groupBy('etiqueta');
        return view('enlace.indexado', compact('groupedEnlaces'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enlaces = Enlace::paginate();

        return view('enlace.index', compact('enlaces'))
            ->with('i', (request()->input('page', 1) - 1) * $enlaces->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enlace = new Enlace();
        $desplegable_enlaces = File::where('rutafile_id', 1)->pluck('path', 'id');
        return view('enlace.create', compact('enlace','desplegable_enlaces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Enlace::$rules);

        $enlace = Enlace::create($request->all());

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enlace = Enlace::find($id);

        return view('enlace.show', compact('enlace'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enlace = Enlace::find($id);
        $desplegable_enlaces = File::where('rutafile_id', 1)->pluck('path', 'id');
        return view('enlace.edit', compact('enlace','desplegable_enlaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enlace $enlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enlace $enlace)
    {
        request()->validate(Enlace::$rules);

        $enlace->update($request->all());

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enlace = Enlace::find($id)->delete();

        return redirect()->route('enlaces.index')
            ->with('success', 'Enlace deleted successfully');
    }
}
