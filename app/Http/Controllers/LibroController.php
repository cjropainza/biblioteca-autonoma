<?php

namespace App\Http\Controllers;

use App\Models\libro;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $libros = libro::latest()->paginate(5);
        return view('libros',['libros'=>$libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('createlibros');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'titulo'=>'required',
            'autor'=>'required',
            'isbn'=>'required',
        ]);
        libro::create($request->all());
        return redirect()->route('libros.index')->with('success','Libro agregado con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(libro $libro): View
    {
        return view('editlibro',['libro'=>$libro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libro $libro): RedirectResponse
    {
        $libro->update($request->all());
        return redirect()->route('libros.index')->with('success','Libro actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libro $libro): RedirectResponse
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success','Libro eliminado con Exito');
    }
}
