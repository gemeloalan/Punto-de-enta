<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


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


    public function ver()
    {
        $sales = Sale::paginate();
        $customers = Customer::select('nombre', 'id')->get();
      
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;

      return view('sale.ver',compact('sales', 'customers', 'products'));
           
    }


    public function store(StoreSaleRequest $request)
    { 
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;
      /*   dd($request->all()); */
    /*   $sale = Sale::create($request->all()); */
    $recibeCantidad =  $request ->input('cantidad');
    $buscaProducto = Product::find($products-> id = $request -> product_id);
$buscaStock = $buscaProducto-> stock;
    $encuentraPrecio = $buscaProducto-> precio;
    $customers = Customer::select('nombre', 'id')->get();
    $products = Product::select('nombre','precio', 'id', 'stock')->get() ;


    if ( $recibeCantidad > $buscaStock ) {
       alert()->info('Cantidad no disponible', 'Supero la cantidad en existencia.');
       return view('sale.create',compact('customers', 'products'));

      }elseif ($recibeCantidad == 0) {
        alert()->info('La cantidad no puede ser cero.', 'Escribe otro numero porfavor'); 
        return view('sale.create', compact('customers', 'products'));



      }
      elseif ($recibeCantidad <= $buscaStock ) {
        
      
      Sale::create(array(
        'customer_id'=> $request ->input('customer_id'),
        'product_id'=> $request ->input('product_id'),
        $buscaProducto = Product::find($products-> id = $request -> product_id),
      $multiplicaPrecio = $encuentraPrecio * $recibeCantidad,
     
      
'total' => $multiplicaPrecio,
        'cantidad'=> $request ->input('cantidad'),
    )); 
    $dato = Product::find($products-> id = $request -> product_id);
    $dato -> id = $dato -> id;
    $dato -> nombre = $dato -> nombre;
    $dato -> descripcion = $dato -> descripcion;
    $dato -> precio = $dato -> precio;
    $resta =  $dato ->stock  - $request -> cantidad;
    $dato ->stock =  $resta;
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


        return redirect()->route('sales.index');
           
    }
    public function pdf()
    {
        $sales = Sale::paginate();
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->stream();
        $pdf = PDF::loadView('sale.detalle',['sales'=>$sales]);
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->download('Reporte-Ventas.pdf');
        // alert()->info('Comenzara la descarga del PDF', ' ');


        return $pdf->download('reporte-Ventas.pdf');
        // return view(' .pdf', compact('products'));
           
    }
   
    public function show($id)
    {
        $sale = Sale::find($id);

        return view('sale.show', compact('sale'));
    }
    public function mirar($id)
    {
        $sale = Sale::find($id);
        $customers = Customer::select('nombre', 'id')->get();
        // dd($customers->all());
        // $products = Product::all();
        $products = Product::select('nombre','precio', 'id', 'stock')->get() ;


        return view('sale.mirar', compact('sale','customers','products'));
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
