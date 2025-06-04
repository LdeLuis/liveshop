<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function proxy(Request $request)
    {
        $numGuia = $request->input('num_guia');
        // Log::info('Número de guía recibido: ' . $numGuia);

        // Lógica adicional para procesar el número de guía...

        return response()->json(['message' => 'Número de guía procesado con éxito']);
    }
}
