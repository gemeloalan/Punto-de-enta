<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class apiSaleController extends Controller
{
    public function index()
    {
        return Sale::all();
    }

    public function create()
    {
        $Sale = new Sale();
        return view('Sale.create', compact('Sale'));
    }

  
    public function store(Request $request)
    {
        $brand = new Sale();
        // dd($request->all());
        // $brand->name = $request->name;
        // $brand->save();
        $brand = Sale::create($request->all());

        return $brand;

    }

  
    public function show($id)
    {
        $categories = Sale::find($id);

        return $categories;
    }

    public function edit($id)
    {
    
    }

    public function update(Request $request, Sale $Sale)
    {

        $Sale->update($request->all());
       

        return $Sale;
    }

    public function destroy($id)
    {
        $Sale = Sale::find($id)->delete();

        return response()->noContent();
    }
}
