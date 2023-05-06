<?php

namespace App\Http\Controllers;

use App\Models\prestamo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $prestamos = prestamo::latest()->paginate(5);
        return view('prestamos',['prestamos'=>$prestamos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('createprestamos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'estudiante_id'=>'required',
            'libro_id'=>'required',
            'fecha_prestamo'=>'required',
            'fecha_devolucion'=>'required',
        ]);
        prestamo::create($request->all());
        return redirect()->route('prestamos.index')->with('success','Prestamo Creado con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prestamo $prestamo): View
    {
        return view('editprestamo',['prestamo'=>$prestamo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prestamo $prestamo)
    {
        $prestamo->update($request->all());
        return redirect()->route('prestamos.index')->with('success','prestamo actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prestamo $prestamo)
    {
        $prestamo->delete();
        return redirect()->route('prestamos.index')->with('success','Prestamo eliminado con Exito');
    }
}
