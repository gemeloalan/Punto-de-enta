<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
// use PDF;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\App;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
 
    public function index()
    {
        $products = Product::paginate();
       

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }
    public function pdf()
    {
        
        $products = Product::paginate();
        // $pdf = PDF::loadView('emails/templates/invoice-pdf', $products);
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->stream();
        /* Loading the view and then downloading it. */
        // $pdf = PDF::loadView('product.pdf',['products'=>$products]);
        // return $pdf->download('Reporte-Productos.pdf');
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->stream();
        // alert()->info('Comenzara la descarga del PDF', ' ');


        $pdf = PDF::loadView('product.pdf', ['products'=>$products]);

        return $pdf->download('reporte-Productos.pdf');
        // return view(' .pdf', compact('products'));
           
    }

  
    public function create()
    {
        $product = new Product();
        $users = DB::table('products')
                ->orderBy('id', 'asc')
                ->get();



        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
        return view('product.create', compact('product', 'categories', 'brands', 'users'));
    }

   
    public function store(Request $request)
    {
        
        request()->validate(Product::$rules);
        $file = $request->file('image');   

        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
       $request->image->move(public_path('image'),$nombre);

       
        
        $archivo = new Product();
        $archivo->image = $nombre;
       $archivo->nombre = $request->nombre;
       $archivo->descripcion = $request->descripcion;
       $archivo->precio = $request->precio;
       $archivo->stock = $request->stock;
       $archivo->total = $request->total;
       $archivo->category_id = $request->category_id;
       $archivo->brand_id = $request->brand_id;
$archivo->save();
        
        alert()->success('Producto Correctamente Agregado', 'Gracias ');

        return redirect()->route('products.index')
            ->with('success', 'Producto Agregado Correctamente.');
    }

  
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

 
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
        return view('product.edit', compact('product', 'categories', 'brands'));
    }

   
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rule);

        $product->update($request->all());
        alert()->success('Producto Correctamente Actualizado', 'Gracias ');

        return redirect()->route('products.index')
            ->with('success', 'Producto Actualizado Correctamente');
    }

    
    public function destroy($id)
    
    {
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
        $product = Product::find($id)->delete();
        alert()->success('Producto Correctamente Eliminado', 'Gracias ');

        return redirect()->route('products.index', compact('brands', 'categories'))
            ->with('success', 'Producto Eliminado Correctamente');
    }
 
}
