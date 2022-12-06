<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\ToSweetAlert;

/**
 * Class MunicipalityController
 * @package App\Http\Controllers
 */
class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipalities = Municipality::paginate();

        return view('municipality.index', compact('municipalities'))
            ->with('i', (request()->input('page', 1) - 1) * $municipalities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipality = new Municipality();
        $states = State::pluck('nombre', 'id');
        return view('municipality.create', compact('municipality', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Municipality::$rules);

        $municipality = Municipality::create($request->all());

alert()->success('Municipio Agregado Correctamente ', 'Gracias ');

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipio Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipalities = Municipality::paginate();

        $municipality = Municipality::find($id);

        return view('municipality.show', compact('municipality', 'municipalities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipality = Municipality::find($id);
        $states = State::pluck('nombre', 'id');


        return view('municipality.edit', compact('municipality', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Municipality $municipality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Municipality $municipality)
    {
        request()->validate(Municipality::$rule);

        $municipality->update($request->all());
        alert()->success('Municipio Actualizado Correctamente ', 'Gracias ');

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipio Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $municipality = Municipality::find($id)->delete();
        alert()->success('Municipio Correctamente Eliminado', 'Gracias ');

        return redirect()->route('municipalities.index')
            ->with('success', 'Municipio Eliminado Correctamente');
    }
}
