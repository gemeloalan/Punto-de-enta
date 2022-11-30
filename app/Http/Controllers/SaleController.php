<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

/**
 * Class SaleController
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::paginate();

        return view('sale.index', compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sale = new Sale();
        // $customers = Customer::all();
        $customers = Customer::select('nombre', 'id')->get();
        // dd($customers->all());
        // $products = Product::all();
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;

        // return $products;

        return view('sale.create', compact('sale', 'customers', 'products'));
    }


    public function store(Request $request)
    { 
            
        request()->validate(Sale::$rules);

        $productoVendido = Sale::createMany($request->all());
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;

        foreach ($products as $product) {
        $productoActualizado = Product::find($product->id);
        $productoActualizado->existencia -= $productoVendido->cantidad;
        $productoActualizado->saveOrFail();
        }
        // $sale = Sale::firstOrCreate($request->all());
        // $sale->sale()->associate($sale   );
        alert()->success('Exito', 'Venta Finalizada');

        return redirect()->route('sales.index')
            ->with('success', 'Venta Existosa.');
    }

   
    public function show($id)
    {
        $sale = Sale::find($id);

        return view('sale.show', compact('sale'));
    }


    public function edit($id)
    {
        $sale = Sale::find($id);
        $customers = Customer::pluck('nombre', 'id');
        $products = Product::pluck('nombre', 'id');


        return view('sale.edit', compact('sale', 'customers', 'products'));
    }

    
    public function update(Request $request, Sale $sale)
    {
        request()->validate(Sale::$rules);

        $sale->update($request->all());
        alert()->success('Exito', 'Venta Actualizada');

        return redirect()->route('sales.index')
            ->with('success', 'Venta actualizada con exito');
    }

  
    public function destroy($id)
    {
        $sale = Sale::find($id)->delete();
        alert()->success('Exito', 'Venta Eliminada');

        return redirect()->route('sales.index')
            ->with('success', 'Venta Eliminada con exito');
    }
}
