<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class apiCategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

  
    public function store(Request $request)
    {
        $brand = new Category();
        // dd($request->all());
        // $brand->name = $request->name;
        // $brand->save();
        $brand = Category::create($request->all());

        return $brand;

    }

  
    public function show($id)
    {
        $categories = Category::find($id);

        return $categories;
    }

    public function edit($id)
    {
    
    }

    public function update(Request $request, Category $category)
    {

        $category->update($request->all());
       

        return $category;
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return response()->noContent();
    }
}
