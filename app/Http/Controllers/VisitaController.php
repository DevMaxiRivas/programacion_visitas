<?php

namespace App\Http\Controllers;

use App\Models\visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VisitaController extends Controller
{
    public function obtener_imagenes(Request $request, visita $visita, $indice_imagen)
    {
        Log::info('visita: ' . $visita);
        Log::info('Indice de imagen solicitada: ' . $indice_imagen);
        $path = $visita->url_imagenes[$indice_imagen] ?? null;

        // Devolver el archivo como respuesta
        $url = Storage::disk('local')->temporaryUrl(
            $path, now()->addMinutes(5)
        );

        return response()->json([
            // 'url' => asset('storage/visitas/imagenes/' . $param),
            'imagen_url' => $url ?? null,
        ]);
    }
}
