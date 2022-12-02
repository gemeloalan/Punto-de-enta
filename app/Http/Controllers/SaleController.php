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
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;
      /*   dd($request->all()); */
    /*   $sale = Sale::create($request->all()); */
    $can =  $request ->input('cantidad');
    $koka = Product::find($products-> id = $request -> product_id);
$panas = $koka-> stock;
    $cholo = $koka-> precio;

    if ( $can > $panas ) {
       alert()->info('Cantidad no disponible', 'Supero la cantidad en existencia.'); 
      }elseif ($can == 0) {
        alert()->info('La cantidad no puede ser cero.', 'Escribe otro numero porfavor'); 

      }
      elseif ($can <= $panas ) {
        
      
      Sale::create(array(
        'customer_id'=> $request ->input('customer_id'),
        'product_id'=> $request ->input('product_id'),
        $koka = Product::find($products-> id = $request -> product_id),
      $mana = $cholo * $can,
     
      
'total' => $mana,
        'cantidad'=> $request ->input('cantidad'),
    )); 
    $dato = Product::find($products-> id = $request -> product_id);
    $dato -> id = $dato -> id;
    $dato -> nombre = $dato -> nombre;
    $dato -> descripcion = $dato -> descripcion;
    $dato -> precio = $dato -> precio;
    $elkks =  $dato ->stock  - $request -> cantidad;
    $dato ->stock =  $elkks;
    $dato ->total = $dato -> total;
    $dato ->category_id = $dato -> category_id;
    $dato ->brand_id = $dato -> brand_id;
    $dato ->created_at = $dato -> created_at;
    $dato ->updated_at = $dato -> updated_at;
    $dato ->deleted_at = $dato -> deleted_at;
    $dato-> save(); 
    alert()->success('Venta Existosa.'); 
    return redirect()->route('sales.index')
    ->with('success', 'Venta Existosa.');
}
     
      
       /*  Sale::create(array(
            'customer_id'=> $request ->input('customer_id'),
            'product_id'=> $request ->input('product_id'),
            'cantidad'=> $request ->input('cantidad'),
        ));  */
        /* $productoActualizado = Producto::find($producto->id);
        $productoActualizado->existencia -= $productoVendido->cantidad;
        $productoActualizado->saveOrFail(); */
       
       /*  $salesa = Sale::select('cantidad', 'product_id')->get() ;

        $productoActualizado = Product::find($products->id);
        $productoActualizado->stock -= $salesa->cantidad;
        $productoActualizado->saveOrFail(); */
     

        return redirect()->route('sales.index');
           
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
