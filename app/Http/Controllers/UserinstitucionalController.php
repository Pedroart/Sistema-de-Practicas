<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userinstitucional;
use Illuminate\Http\Request;

/**
 * Class UserinstitucionalController
 */
class UserinstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            $userinstitucionals = Userinstitucional::all();
        } else {
            $id = $user->userinstitucional->escuela_id;
            $userinstitucionals = Userinstitucional::where('escuela_id', $id)->get();
        }

        return view('userinstitucional.index', compact('userinstitucionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userinstitucional = new Userinstitucional;

        return view('userinstitucional.create', compact('userinstitucional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Userinstitucional::$rules);

        $userinstitucional = Userinstitucional::create($request->all());

        return redirect()->route('userinstitucionals.index')
            ->with('success', 'Userinstitucional created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userinstitucional = Userinstitucional::find($id);

        return view('userinstitucional.show', compact('userinstitucional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userinstitucional = Userinstitucional::find($id);

        return view('userinstitucional.edit', compact('userinstitucional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userinstitucional $userinstitucional)
    {
        request()->validate(Userinstitucional::$rules);

        $userinstitucional->update($request->all());

        return redirect()->route('userinstitucionals.index')
            ->with('success', 'Userinstitucional updated successfully');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userinstitucional = Userinstitucional::find($id);
        $user = User::find($userinstitucional->user_id)->delete();

        return redirect()->route('userinstitucionals.index')
            ->with('success', 'Userinstitucional deleted successfully');
    }
}
