<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Visita;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ModificarVisitasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Iniciando el middleware de modificación de visitas.');

        if(User::actual()->rol->is_admin()){
            Log::info('El usuario es administrador, se permite la modificación de visitas.');
            return $next($request);
        }

        $parametros_ruta = $request->route()->parameters();
        $visita = $parametros_ruta['visita'] ?? null;

        if (!empty($visita) && $visita->es_editable()) {
            Log::info('La visita es editable, se permite la modificación.');
            return $next($request);
        }

        return response()->view('errors.403', [], 403);
    }
}
