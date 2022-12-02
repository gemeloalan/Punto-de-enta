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

class apiProductController extends Controller
{
 
    public function index()
    {
      
    return Product::all();
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
        return $pdf->download('Reporte-Productos.pdf');
        // alert()->info('Comenzara la descarga del PDF', ' ');


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

        $product = Product::create($request->all());

        return $product;
    }

  
    public function show($id)
    {
        $products = Product::find($id);

        return $products;
    }

 
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
 
    }

   
    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        return $product;
    }

    
    public function destroy($id)
    
    {
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('nombre', 'id');
        $product = Product::find($id)->delete();
        return response()->noContent();
    }
 
}
