<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bitacoras::all();
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
        $bitacora = new Bitacoras();
        $bitacora->bitacora = $request->bitacora;
        $bitacora->id_usuario = $request->id_usuario;
        $bitacora->fecha = $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->so = $request->so;
        $bitacora->navegador = $request->navegador;
        $bitacora->save();
        return "La bitacora se guardo correctamente";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bitacora = Bitacoras::find($id);
        if ($bitacora) {
            return $bitacora;
        } else {
            return "La bitacora no existe";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacoras $bitacoras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bitacora = Bitacoras::find($id);
        if ($bitacora) {
            $bitacora->bitacora = $request->bitacora;
            $bitacora->id_usuario = $request->id_usuario;
            $bitacora->fecha = $request->fecha;
            $bitacora->hora = $request->hora;
            $bitacora->ip = $request->ip;
            $bitacora->so = $request->so;
            $bitacora->navegador = $request->navegador;
            $bitacora->save();
            return "La bitacora se actualizo correctamente";
        } else {
            return "La bitacora no existe";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bitacora = Bitacoras::find($id);
        if ($bitacora) {
            $bitacora->delete();
            return "La bitacora se elimino correctamente";
        } else {
            return "La bitacora no existe";
        }
    }
}
