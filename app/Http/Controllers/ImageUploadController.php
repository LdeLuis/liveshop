<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/uploads'); // Almacena la imagen en el directorio 'public/uploads'
            $url = Storage::url($path); // Obtiene la URL de la imagen

            return response()->json($url);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
