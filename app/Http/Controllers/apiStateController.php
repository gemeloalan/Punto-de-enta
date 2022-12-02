<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;
class apiStateController extends Controller
{
    public function index()
    {
    return State::all(); 
    }

 =/=
    public function store(Request $request)
    {
       $request->validate([
            'nombre' => ['required', 'min:3', 'unique:states,nombre'],
        ]);

        $state = State::create($request->all());
        
        return $state;
        // return response()->json('Registro exitoso',200);
    }


    public function show($id)
    {
        $states = State::find($id);

        return $states;
    }

    public function update(Request $request, State $state)
    {

        $state->update($request->all());

        return $state;
    }


    public function destroy($id)
    {
        $state = State::find($id);
        if(is_null($state) )
{

return response()->json('No existe el registro',404);
}
        $state->delete();

        return response()->noContent();
    }
}
