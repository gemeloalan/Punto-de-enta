<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('image.add');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'hola';
    }

    

    public function store(StoreImageRequest $request)
    {
        $request->validate([
            'image' => ['required','mimes:jpg,jpeg,bmp,png', 'max:2040', 'dimensions:min_width=100,min_height=200|max:5000'],
        ]);
        $file = $request->file('image');   

        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
       $request->image->move(public_path('image'),$nombre);

       
    //    Guarda imagen en bases de datos
    $archivo = new Image;
    $archivo->image = $nombre;
    $archivo->save();
        alert()->success('Buen trabajo se inserto correctamente ', 'Agrega otra ♥');;
        return view('image.add');     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
