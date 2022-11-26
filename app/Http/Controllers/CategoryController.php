<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate();

        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Category::$rules);

        $category = Category::create($request->all());
        alert()->success('Categoria Correctamente Agregada', 'Gracias ');

        return redirect()->route('categories.index')
            /* A flash message. */
            ->with('success', 'Categoria Agregadas');
    }

  
    public function show($id)
    {
        $category = Category::find($id);

        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        request()->validate(Category::$rule);

        $category->update($request->all());
        alert()->success('Categoria Correctamente Actualizada', 'Gracias ');

        return redirect()->route('categories.index')
            ->with('success', 'Categoria Actualizada');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        alert()->success('Categoria Correctamente Eliminada', 'Gracias ');

        return redirect()->route('categories.index')
            ->with('success', 'Categoria Eliminada');
    }
}
