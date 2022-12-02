<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class BrandController
 * @package App\Http\Controllers
 */
class apiBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return Brand::all(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();

        $categories = Category::pluck('name', 'id');
        
        return view('brand.create', compact('brand', 'categories'));
    }

 
    public function store(Request $request)
    {
        // dd($request->all());
        $brand = new Brand();
     /*    $brand->nombre = $request->nombre;
        $brand->category_id = $request->category_id;
        $brand->save();
 */
        
        
        $brand = Brand::create($request->all());
        return $brand;
        
    }

  
    public function show($id)
    {
        $brands = Brand::find($id);

        return $brands;
    }

   

    public function update(Request $request, Brand $brand)
    {

        $brand->update($request->all());

        return $brand;
    }
    public function destroy($id)
    {
        $brand = Brand::find($id)->delete();

        return response()->noContent();
    }
}
