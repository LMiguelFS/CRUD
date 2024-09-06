<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with('autor')->get();
        $autores = Autor::all();
        return view('menuLibros', compact('libros', 'autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $Verificar=Libro::create($request->only('titulo','genero','fechaPublicación','autor_id'));
        } catch (\Throwable $th) {
            $Verificar=0;
        }

        if($Verificar==true){
            return redirect()->route('libro.index')->with('success','Libro registrado exitosamente');
        }else{
            return redirect()->route('libro.index')->with('failure','Libro no registrado');
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
    public function update(Request $request, Libro $libro)
    {
        try {
            $Verificar=$libro->update($request->only('titulo','genero','fechaPublicación','autor_id'));
        } catch (\Throwable $th) {
            $Verificar=0;
        }

        if($Verificar==true){
            return redirect()->route('libro.index')->with('success','Libro modificado exitosamente');
        }else{
            return redirect()->route('libro.index')->with('failure','Libro no modificado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        try {
            $verificar=$libro->delete();
        } catch (\Throwable $th) {
            $verificar=0;
        }

        if ($verificar==true) {
            return redirect()->route('libro.index')->with('success','Libro eliminado');
        }else{
            return redirect()->route('libro.index')->with('failure','Libro no eliminado');
        }
    }
}
