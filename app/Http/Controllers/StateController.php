<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;

/**
 * Class StateController
 * @package App\Http\Controllers
 */
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate();

        return view('state.index', compact('states'))
            ->with('i', (request()->input('page', 1) - 1) * $states->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = new State();
        
        return view('state.create', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(State::$rules);

        $state = State::create($request->all());
        alert()->success('Estado Correctamente Agregado', 'Gracias ');

        return redirect()->route('states.index')
            ->with('success', 'Estado Agregado Correctamente.');
    }


    public function show($id)
    {
        $state = State::find($id);
        $municipalities = Municipality::get();


        return view('state.show', compact('state', 'municipalities'));
    }

  
    public function edit($id)
    {
        $state = State::find($id);

        return view('state.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        request()->validate(State::$rule);

        $state->update($request->all());
        alert()->success('Estado Correctamente Actualizado', 'Gracias ');

        return redirect()->route('states.index')
            ->with('success', 'Estado Actualizado Correctamente');
    }


    public function destroy($id)
    {
        $state = State::find($id)->delete();
        alert()->success('Estado Correctamente Eliminado', 'Gracias ');

        return redirect()->route('states.index')
            ->with('success', 'Estado Eliminado COrrectamente');
    }
}
