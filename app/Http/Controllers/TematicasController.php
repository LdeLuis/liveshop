<?php

namespace App\Http\Controllers;

use App\Tematica;
use Illuminate\Http\Request;

class TematicasController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tematica_titulo' => 'required|string|max:255',
        ]);

        $tematica = new Tematica;
        $tematica->tematica = $validatedData['tematica_titulo'];
        $tematica->save();

        return response()->json([
            'success' => true,
            'tematica' => $tematica
        ]);
    }

    public function deactivate(Tematica $tematica)
    {   
        try {
            $tematica->activo = 0;
            $tematica->update();

            $tematica->blogs()->update(['activo' => 0]);
    
            return response()->json(['success' => true,  'message' => 'Tematica eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar la tematica.'], 500);
        }
    }

    public function activate(Tematica $tematica)
    {
        try {
            $tematica->activo = 1;
            $tematica->update();

            $tematica->blogs()->update(['activo' => 1]);
    
            return response()->json(['success' => true,  'message' => 'Tematica activada.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo activar la tematica.'], 500);
        }
    }

    public function destroy(Tematica $tematica)
    {
        try {
            foreach($tematica->blogs as $blog) {
                $img_blog = 'img/photos/blogs/'.$blog->portada;
                unlink($img_blog);
                $blog->delete();
            }

            $tematica->delete();

            return response()->json(['success' => true, 'message' => 'Temática eliminada.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar la temática.'], 500);
        }
    }
}
