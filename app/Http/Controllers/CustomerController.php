<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = new Customer();
        $states = State::pluck('nombre', 'id');
        $municipalities = Municipality::pluck('nombre', 'id');
        return view('customer.create', compact('customer', 'states', 'municipalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Customer::$rules);

        $customer = Customer::create($request->all());
        alert()->success('Cliente Correctamente Agregada', 'Gracias ');


        return redirect()->route('customers.index')
            ->with('success', 'Cliente creado Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $states = State::pluck('nombre', 'id');
        $municipalities = Municipality::pluck('nombre', 'id');


        return view('customer.edit', compact('customer', 'states', 'municipalities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate(Customer::$rule);

        $customer->update($request->all());
        alert()->success('Marca Correctamente Actualizado', 'Gracias ');


        return redirect()->route('customers.index')
            ->with('success', 'Cliente Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();
        alert()->success('Cliente Eliminado Correctamente ', 'Gracias ');


        return redirect()->route('customers.index')
            ->with('success', 'Cliente Eliminado Correctamente');
    }
}
