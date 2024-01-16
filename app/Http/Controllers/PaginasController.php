<?php

namespace App\Http\Controllers;

use App\Models\Paginas;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Paginas::all();
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
        $pagina = new Paginas();
        $pagina->usuario_creacion = $request->usuario_creacion;
        $pagina->usuario_modificacion = $request->usuario_modificacion;
        $pagina->url = $request->url;
        $pagina->estado = $request->estado;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->img = $request->img;
        $pagina->tipo = $request->tipo;
        $pagina->save();

        return response()->json([
            'mensaje' => 'Pagina Creada',
            'bitacora_message' => "Creada Pagina" . " " . $pagina->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pagina = Paginas::find($id);
        if ($pagina) {
            return $pagina;
        } else {
            return "No se encontro la pagina";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paginas $paginas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pagina = Paginas::find($id);
        $pagina->usuario_creacion = $request->usuario_creacion;
        $pagina->usuario_modificacion = $request->usuario_modificacion;
        $pagina->url = $request->url;
        $pagina->estado = $request->estado;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->img = $request->img;
        $pagina->tipo = $request->tipo;
        $pagina->save();
        return response()->json([
            'mensaje' => 'Actualizada Pagina',
            'bitacora_message' => "Actualizada Pagina" . " " . $id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $pagina = Paginas::find($id);
        if ($pagina) {
            $pagina->delete();

            return response()->json([
                'mensaje' => 'Se eliminó la página',
                'bitacora_message' => 'Se eliminó la página' . " " . $id,
            ]);
        } else {
            return response()->json([
                'mensaje' => 'No se pudo eliminar la pagina',
                'bitacora_message' => 'No se pudo la pagina' . " " . $id
            ]);
        }
    }
}
