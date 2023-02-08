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
    public function pdf()
    {
        $customers = Customer::paginate();

        $pdf = PDF::loadView('customer.pdf',['customers'=>$customers]);
        //return $pdf->stream();
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
        $request->validate([
            'image' => ['required','mimes:jpg,jpeg,bmp,png', 'max:2040'],
        ]);
        $file = $request->file('image');   

        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
       $request->image->move(public_path('customer'),$nombre);

       


       $archivo = new Customer();
       $archivo->image = $nombre;
       $archivo->nombre = $request->nombre;
       $archivo->correo = $request->correo;
       $archivo->telefono = $request->telefono;
       $archivo->direccion = $request->direccion;
$archivo->save();
        alert()->success('Cliente Correctamente Agregada', 'Gracias ');


        return redirect()->route('customers.index')
            ->with('success', 'Cliente creado Correctamente.');
    }

    
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
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
        $request->validate([
            'image' => ['required','mimes:jpg,jpeg,bmp,png', 'max:2040'],
        ]);
        if ($request->hasFile('image')){
            $archivoimage=$request->file('image');
            $nombreimage=time().$archivoimage->getClientOriginalName(); 
            $archivoimage->move(public_path().'/customer/', $nombreimage);

  // esta es la línea que faltaba. Llamo a la image del modelo y le asigno la image recogida por el formulario de actualizar.          
        $customer->image=$nombreimage; 
        

          }
        //   return $nombreimage;
        $customer->update($request->except('image'));
        alert()->success('Cliente actualizado Agregada', 'Gracias ');
 return redirect()->route('customers.index')
             ->with('success', 'Cliente Actualizado Correctamente');


        // Antiguoooo
        // request()->validate(Customer::$rule);

        // $customer->update($request->all());
        // alert()->success('Marca Correctamente Actualizado', 'Gracias ');


        // return redirect()->route('customers.index')
        //     ->with('success', 'Cliente Actualizado Correctamente');
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
