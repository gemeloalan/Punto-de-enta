<?php

namespace App\Http\Controllers;

use App\Models\ProductSale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class ProductSaleController extends Controller
{

    public function index()
    {
        $productSales = ProductSale::paginate();

        return view('product-sale.index', compact('productSales'))
            ->with('i', (request()->input('page', 1) - 1) * $productSales->perPage());
    }
    public function pdf()
    {
        $productSales = ProductSale::paginate();

        $pdf = PDF::loadView('product-sale.pdf',['productSales'=>$productSales]);
        // return $pdf->stream();
        return $pdf->download('Detalle de Ventas.pdf');


    }

    public function create()
    {
        $productSale = new ProductSale();
        
        return view('product-sale.create', compact('productSale'));
    }

    public function store(Request $request)
    {
        request()->validate(ProductSale::$rules);

        $productSale = ProductSale::create($request->all());

        return redirect()->route('product-sale.index')
            ->with('success', 'ProductSale created successfully.');
    }

    public function show($id)
    {
        $productSale = ProductSale::find($id);

        return view('product-sale.show', compact('productSale'));
    }

    public function edit($id)
    {
        $productSale = ProductSale::find($id);

        return view('product-sale.edit', compact('productSale'));
    }

    public function update(Request $request, ProductSale $productSale)
    {
        request()->validate(ProductSale::$rules);

        $productSale->update($request->all());

        return redirect()->route('product-sale.index')
            ->with('success', 'ProductSale updated successfully');
    }

    public function destroy($id)
    {
        $productSale = ProductSale::find($id)->delete();

        return redirect()->route('product-sale.index')
            ->with('success', 'ProductSale deleted successfully');
    }
}
