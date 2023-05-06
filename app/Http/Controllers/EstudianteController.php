<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\libro;
use App\Models\prestamo;


class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $estudiantes = estudiante::latest()->paginate(5);
        return view('estudiantes',['estudiantes'=>$estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estudiantes = estudiante::all();
        $libros = libro::where('disponible', true)->get();
        return view('prestamos.create', compact('estudiantes', 'libros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'libro_id' => 'required|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date'
        ]);

        // Verificar que el libro esté disponible para prestar
        $libro = Libro::findOrFail($request->libro_id);
        if (!$libro->disponible) {
            return redirect()->back()->withErrors(['El libro no está disponible para préstamo']);
        }

        // Crear el préstamo
        $prestamo = new Prestamo([
            'estudiante_id' => $request->get('estudiante_id'),
            'libro_id' => $request->get('libro_id'),
            'fecha_prestamo' => $request->get('fecha_prestamo'),
            'fecha_devolucion' => $request->get('fecha_devolucion')
        ]);
        $prestamo->save();

        // Actualizar el estado del libro a no disponible
        $libro->disponible = false;
        $libro->save();

        return redirect()->route('prestamos.index')
                         ->with('success', 'El préstamo ha sido creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estudiante $estudiante): View
    {
        return view('editestudiante',['estudiante'=>$estudiante]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estudiante $estudiante): RedirectResponse
    {
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')->with('success','Estudiante actualizado con Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estudiante $estudiante): RedirectResponse
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success','Estudiante eliminado con Exito');
    }
}
