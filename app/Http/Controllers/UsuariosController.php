<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Models\Personas;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuarios::all();
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
        $usuario = Usuarios::create([
            'email' => $request->email,
            'password' => $request->password,
            'img' => $request->img,
            'habilitado' => $request->habilitado,
            'fecha' => $request->fecha,
        ]);

        $usuario->persona()->create([
            'id_usuario' => $usuario->id,
        ]);
        return response()->json([
            'mensaje' => 'Usuario creado',
            'bitacora_message' => "Usuario creado" . " " . $usuario->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            return $usuario;
        } else {
            return "No se encontró el usuario";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            $usuario->email = $request->email;
            $usuario->img = $request->img;
            $usuario->habilitado = $request->habilitado;
            $usuario->fecha = $request->fecha;
            $usuario->save();
            return response()->json([
                'mensaje' => 'Usuario actualizada',
                'bitacora_message' => "Actualizado Usuario" . " " . $id,
            ]);
        } else {
            return "No se encontró el usuario";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario) {
            $usuario->delete();
            return response()->json([
                'mensaje' => 'Usuario eliminado',
                'bitacora_message' => "Eliminado usuario" . " " . $id,
            ]);
        } else {
            return "No se encontró el usuario";
        }
    }
}
