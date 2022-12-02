<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class apiCustomerController extends Controller
{

    public function index()
    {
        return Customer::all();
    }
    public function pdf()
    {
        $customers = Customer::paginate();

        $pdf = PDF::loadView('customer.pdf', ['customers' => $customers]);
        // return $pdf->stream();
        return $pdf->download('reporte-Clientes.pdf');
    }



    public function store(Request $request)
    {
        $request->validate = [
            'nombre' => 'required',
            'correo' => ['required', 'email', 'unique:customers,correo'],
            'telefono' => ['required',  'between:10,12', 'unique:customers,telefono'],
            'direccion' => ['required', 'string', 'max:255'],
        ];
        $customer = Customer::create($request->all());
        return $customer;
    }

    public function show($id)
    {
        $customers = Customer::find($id);

        return $customers;
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate = [
            'nombre' => 'required',
            'correo' => ['required', 'email', 'unique:customers,correo'],
            'telefono' => ['required',  'between:10,12', 'unique:customers,telefono'],
            'direccion' => ['required', 'string', 'max:255'],
        ];

        $customer->update($request->all());


        return $customer;
    }

    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();
        return response()->noContent();
    }
}
