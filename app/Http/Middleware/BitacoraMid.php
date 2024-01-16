<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Bitacoras;

class BitacoraMid
{
    public function handle($request, Closure $next)
    {
        // Verifica si la solicitud no es un método GET
        if ($request->method() !== 'GET') {
            $response = $next($request);
            $bitacora = new Bitacoras;
            $bitacoraMessage = $response->original['bitacora_message'] ?? null;

            // Asigna el mensaje de la bitácora
            $bitacora->bitacora = $bitacoraMessage ?: 'Entrada Modificada';
            $bitacora->id_usuario =
                Auth::check() ? Auth::user()->id : 1;
            $bitacora->fecha = date('Y-m-d');
            $bitacora->hora = date('H:i:s');
            $bitacora->ip = $request->ip();
            $bitacora->so = php_uname();
            $bitacora->navegador = $request->header('User-Agent');
            $bitacora->save();

            return $response;
        }

        // Si es una solicitud GET, simplemente continua con la ejecución normal
        return $next($request);
    }
}
