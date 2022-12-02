<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\ToSweetAlert;

class apiMunicipalityController extends Controller
{
    public function index()
    {
     
    return Municipality::all();
}

    public function create()
    {
        $municipality = new Municipality();
        $states = State::pluck('nombre', 'id');
        return view('municipality.create', compact('municipality', 'states'));
    }
    public function store(Request $request)
    {

        $municipality = Municipality::create($request->all());


        return $municipality;
    }

    public function show($id)
    {
        $municipalities = Municipality::find($id);

        return $municipalities;
    }
    public function edit($id)
    {
   
    }
    public function update(Request $request, Municipality $municipality)
    {

        $municipality->update($request->all());

        return $municipality;
    }
    public function destroy($id)
    {
        $municipality = Municipality::find($id)->delete();
        return response()->noContent();
    }
}
