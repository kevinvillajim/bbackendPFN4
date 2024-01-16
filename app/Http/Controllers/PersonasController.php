<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Personas::all();
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
        $persona = new Personas();
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->bio = $request->bio;
        $persona->phone = $request->phone;
        $persona->usuario_creacion = $request->usuario_creacion;
        $persona->usuario_modificacion = $request->usuario_modificacion;
        $persona->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persona = Personas::find($id);
        if ($persona) {
            return $persona;
        } else {
            return "No se encontro la persona";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $persona = Personas::find($id);
        $persona->primer_nombre = $request->primer_nombre;
        $persona->segundo_nombre = $request->segundo_nombre;
        $persona->primer_apellido = $request->primer_apellido;
        $persona->segundo_apellido = $request->segundo_apellido;
        $persona->bio = $request->bio;
        $persona->phone = $request->phone;
        $persona->usuario_creacion = $request->usuario_creacion;
        $persona->usuario_modificacion = $request->usuario_modificacion;
        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Personas::find($id);
        if ($persona) {
            $persona->delete();
            return "Persona eliminada";
        } else {
            return "No se encontro la persona";
        }
    }
}
