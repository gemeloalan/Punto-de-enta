<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class apiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return Customer::all();  
    }
    public function pdf()
    {
        $customers = Customer::paginate();

        $pdf = PDF::loadView('customer.pdf',['customers'=>$customers]);
        // return $pdf->stream();
        return $pdf->download('reporte-Clientes.pdf');


    }

    public function create()
    {
        $customer = new Customer();
        $states = State::pluck('nombre', 'id');
        $municipalities = Municipality::pluck('nombre', 'id');
        return view('customer.create', compact('customer', 'states', 'municipalities'));
    }


    public function store(Request $request)
    {
        request()->validate(Customer::$rules);

        $customer = Customer::create($request->all());
        alert()->success('Cliente Correctamente Agregada', 'Gracias ');


        return redirect()->route('customers.index')
            ->with('success', 'Cliente creado Correctamente.');
    }

    
    public function show($id)
    {
             $customers = Customer::find($id);

       return $customers;
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $states = State::pluck('nombre', 'id');
        $municipalities = Municipality::pluck('nombre', 'id');


        return view('customer.edit', compact('customer', 'states', 'municipalities'));
    }

 
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
