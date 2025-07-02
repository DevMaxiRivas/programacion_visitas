<?php

namespace App\Http\Controllers;

use App\Models\visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VisitaController extends Controller
{
    public function obtener_imagenes(Request $request, visita $visita, $indice)
    {
        Log::info('visita: ' . $visita);
        Log::info('Indice de imagen solicitada: ' . $indice);
        $path = $visita->url_imagenes[$indice] ?? null;

        // Devolver el archivo como respuesta
        $url = Storage::disk('local')->temporaryUrl(
            $path, now()->addMinutes(5)
        );

        return redirect($url);
    }
    public function obtener_archivos(Request $request, visita $visita, $indice)
    {
        Log::info('visita: ' . $visita);
        Log::info('Indice de imagen solicitada: ' . $indice);
        $path = $visita->url_archivos[$indice] ?? null;

        // Devolver el archivo como respuesta
        $url = Storage::disk('local')->temporaryUrl(
            $path, now()->addMinutes(5)
        );

        return redirect($url);
    }
}
