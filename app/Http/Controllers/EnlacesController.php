<?php

namespace App\Http\Controllers;

use App\Models\Enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Enlaces::all();
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
        $enlace = new Enlaces();
        $enlace->id_rol = $request->id_rol;
        $enlace->id_pagina = $request->id_pagina;
        $enlace->descripcion = $request->descripcion;
        $enlace->usuario_creacion = $request->usuario_creacion;
        $enlace->usuario_modificacion = $request->usuario_modificacion;
        $enlace->save();
        return "El enlace se guardo correctamente";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enlaces = Enlaces::find($id);
        if ($enlaces) {
            return $enlaces;
        } else {
            return "No se encontro el enlace";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enlaces $enlaces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enlace = Enlaces::find($id);
        if ($enlace) {
            $enlace->id_rol = $request->id_rol;
            $enlace->id_pagina = $request->id_pagina;
            $enlace->descripcion = $request->descripcion;
            $enlace->usuario_creacion = $request->usuario_creacion;
            $enlace->usuario_modificacion = $request->usuario_modificacion;
            $enlace->save();
            return "El enlace se actualizo correctamente";
        } else {
            return "El enlace no existe";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enlace = Enlaces::find($id);
        if ($enlace) {
            $enlace->delete();
            return "El enlace se elimino correctamente";
        } else {
            return "El enlace no existe";
        }
    }
}
