<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class BrandController
 * @package App\Http\Controllers
 */
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate();

        return view('brand.index', compact('brands'))
            ->with('i', (request()->input('page', 1) - 1) * $brands->perPage());
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Brand::$rules);

        $brand = Brand::create($request->all());
        alert()->success('Marca Correctamente Agregada', 'Gracias ');

        return redirect()->route('brands.index')
            ->with('success', 'Se agrego la marca ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        return view('brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        $categories = Category::pluck('name', 'id');


        return view('brand.edit', compact('brand', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        request()->validate(Brand::$rules);

        $brand->update($request->all());
        alert()->success('Marca Correctamente Actualizada', 'Gracias ');

        return redirect()->route('brands.index')
            ->with('success', 'Marca Actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $brand = Brand::find($id)->delete();
        alert()->success('Marca Correctamente Eliminada', 'Gracias ');

        return redirect()->route('brands.index')
            ->with('success', 'Marca eliminada');
    }
}
