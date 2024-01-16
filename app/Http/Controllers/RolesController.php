<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Roles::all();
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
        $rol = new Roles();
        $rol->rol = $request->rol;
        $rol->usuario_creacion = $request->usuario_creacion;
        $rol->usuario_modificacion = $request->usuario_modificacion;
        $rol->estado = $request->estado;
        $rol->save();
        return response()->json([
            'mensaje' => 'El rol se creo correctamente',
            'bitacora_message' => "Creado Rol" . " " . $rol->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rol = Roles::find($id);
        if ($rol) {
            return $rol;
        } else {
            return "El rol no existe";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rol = Roles::find($id);
        if ($rol) {
            $rol->rol = $request->rol;
            $rol->usuario_creacion = $request->usuario_creacion;
            $rol->usuario_modificacion = $request->usuario_modificacion;
            $rol->estado = $request->estado;
            $rol->save();
            return response()->json([
                'mensaje' => 'El rol se gactualizó correctamente',
                'bitacora_message' => "Actualizado Rol" . " " . $id,
            ]);
        } else {
            return "El rol no existe";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Roles::find($id);
        if ($rol) {
            $rol->delete();
            return response()->json([
                'mensaje' => 'El rol se eliminó correctamente',
                'bitacora_message' => "El rol se eliminó correctamente" . " " . $id,
            ]);
        } else {
            return "El rol no existe";
        }
    }
}
