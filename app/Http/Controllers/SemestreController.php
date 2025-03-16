<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

/**
 * Class SemestreController
 */
class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semestres = Semestre::paginate();

        return view('semestre.index', compact('semestres'))
            ->with('i', (request()->input('page', 1) - 1) * $semestres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semestre = new Semestre();

        return view('semestre.create', compact('semestre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Semestre::$rules);

        $semestre = Semestre::create($request->all());

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semestre = Semestre::find($id);

        return view('semestre.show', compact('semestre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semestre = Semestre::find($id);

        return view('semestre.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semestre $semestre)
    {
        request()->validate(Semestre::$rules);

        $semestre->update($request->all());

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $semestre = Semestre::find($id)->delete();

        return redirect()->route('semestres.index')
            ->with('success', 'Semestre deleted successfully');
    }
}
