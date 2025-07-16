<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Visita;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class VerVisitasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $parametros_ruta = $request->route()->parameters();
        $visita = $parametros_ruta['record'];

        if(empty($visita)) {
            return response()->view('errors.404', [], 404);
        }

        if (!$visita instanceof Visita) {
            $visita = Visita::findOrFail($visita);
        }

        if (User::actual()->rol->is_admin() || $visita->es_visible()) {
            return $next($request);
        }
        
        return response()->view('errors.403', [], 403);
    }
}
