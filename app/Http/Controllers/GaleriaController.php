<?php

namespace App\Http\Controllers;

use App\Models\galeria;
use Illuminate\Http\Request;

// llamamos al Storage
use  Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias['galerias'] = galeria::Paginate(8);
        return view('galeria.index', $galerias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('galeria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Guardar los datos enviados desde el formulario
        $insertar = request()->except('_token');
        
        // Subir imagen al servidor
        if($request->hasFile('image')) {
            $insertar['image'] = $request->file('image')->store('galeria', 'public');
        }  

        galeria::insert($insertar);
        return redirect('galeria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $galeria = galeria::findOrFail($id);
        return view('galeria.show', compact('galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $galeria = galeria::findOrFail($id);
        return view('galeria.edit', compact('galeria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $editar = request()->except('_token', '_method');

        // Subir imagen al servidor
        if($request->hasFile('image')) {
            $editar['image'] = $request->file('image')->store('galeria', 'public');
        }  
        //guardar en la bd
        galeria::where('id','=',$id)->update($editar);

        //regresar
        return redirect('galeria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $imagen = galeria::findOrFail($id);
        
        if (Storage::delete('public/'.$imagen->image)) {
            galeria::destroy($id);
        }
        
        return redirect('galeria');
    }
}
