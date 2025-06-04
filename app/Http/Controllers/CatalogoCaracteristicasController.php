<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogoCaracteristicas;

class CatalogoCaracteristicasController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $caracteristica = CatalogoCaracteristicas::findOrFail($id);
            $caracteristica->delete();

            return response()->json(['success' => true, 'message' => 'Característica eliminada'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar la característica'], 500);
        }
    }
}
