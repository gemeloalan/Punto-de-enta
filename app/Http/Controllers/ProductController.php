<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\PDF;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

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
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->stream();
        $pdf = PDF::loadView('product.pdf',['products'=>$products]);
        // $pdf->loadHTML('<h1>Hola Mundo</h1>');
        // return $pdf->stream();
        return $pdf->download('Productos.pdf');
        // alert()->info('Comenzara la descarga del PDF', ' ');


        // return view(' .pdf', compact('products'));
           
    }

  
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
        return view('product.create', compact('product', 'categories', 'brands'));
    }

   
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());
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
