<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::paginate();

        return view('sale.index', compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    public function create()
    {
        $sale = new Sale();
        $products = Product::pluck('nombre', 'id', 'stock');
        $customers = Customer::pluck('nombre', 'id');


        
        return view('sale.create', compact('sale','products',  'customers'));
    }

    public function store(Request $request)
    {
        request()->validate(Sale::$rules);

        $sale = Sale::create($request->all());
        foreach ($request->product_id as $key =>$products){
            $resultado[] = array(
            "product_id"=>$request->product_id[$key]
            , "cantidad"=>$request->cantidad[$key]
            , "precio"=>$request->precio[$key]
            , "descuento"=>$request->descuento[$key]);
            $sale->productSales()->createMany($resultado); 
         }
         alert()->success('Buen trabajo');

        return redirect()->route('sales.index')
            ->with('success', 'Venta Exitosa.');
    }

    public function show($id)
    {
        $sale = Sale::find($id);

        return view('sale.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $products = Product::pluck('nombre ','id');
        $customers = Customer::pluck('nombre ','id');

        return view('sale.edit', compact('sale' ,'products', 'customers'));
    }

    public function update(Request $request, Sale $sale)
    {
        request()->validate(Sale::$rules);

        $sale->update($request->all());

        return redirect()->route('sales.index')
            ->with('success', 'Venta corregida correctamente');
    }

    public function destroy($id)
    {
        $sale = Sale::find($id)->delete();
alert()->success('La venta se elimino con exito');
        return redirect()->route('sales.index')
            ->with('success', 'Venta Eliminada correctamente');
    }
}
