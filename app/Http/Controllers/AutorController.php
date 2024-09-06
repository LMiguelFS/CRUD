<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores=Autor::all();
        return view('menuAutores', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Autor $autor)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $Verificar=Autor::create($request->only('nombres','apellidos','nacionalidad','fechaNacimiento','celular'));
        } catch (\Throwable $th) {
            $Verificar=0;
        }

        if($Verificar==true){
            return redirect()->route('autor.index')->with('success','Autor creado exitosamente');
        }else{
            return redirect()->route('autor.index')->with('failure','Autor no creado');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor)
    {
        try {
            $Verificar=$autor->update($request->only('nombres','apellidos','nacionalidad','fechaNacimiento','celular'));
        } catch (\Throwable $th) {
            $Verificar=0;
        }

        if($Verificar==true){
            return redirect()->route('autor.index')->with('success','Autor modificado exitosamente');
        }else{
            return redirect()->route('autor.index')->with('failure','Autor no modificado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        try {
            $verificar=$autor->delete();
        } catch (\Throwable $th) {
            $verificar=0;
        }

        if ($verificar==true) {
            return redirect()->route('autor.index')->with('success','Autor eliminado');
        }else{
            return redirect()->route('autor.index')->with('failure','Autor no eliminado');
        }
    }
}
