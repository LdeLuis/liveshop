<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriasController extends Controller
{
    public function store(Request $request)
    {
        $categoria = new Categoria;

        $file_categoria = $request->file('n_categoria_portada');
        $extension_categoria = $file_categoria->getClientOriginalExtension();
        $namefile_categoria = Str::random(30) . '.' . $extension_categoria;

        \Storage::disk('local')->put("img/photos/categorias/" . $namefile_categoria, \File::get($file_categoria));

        $categoria->categoria = $request->n_categoria_nombre;
        $categoria->portada = $namefile_categoria;

        $categoria->save();

        \Toastr::success('Categoria creado con éxito');
        return redirect()->back();
    }

    public function deactivate(Categoria $categoria) {
        try {
            $categoria->activo = 0;
            $categoria->update();

            $categoria->catalogos()->update(['activo' => 0]);
    
            return response()->json(['success' => true,  'message' => 'Categoria eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar la categoria.'], 500);
        }
    }

    public function activate(Categoria $categoria) {
        try {
            $categoria->activo = 1;
            $categoria->update();

            $categoria->catalogos()->update(['activo' => 1]);
    
            return response()->json(['success' => true,  'message' => 'Categoria eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar la categoria.'], 500);
        }
    }

    public function destroy(Categoria $categoria)
    {
        try {

            $img_categoria = 'img/photos/categorias/'.$categoria->portada;
            unlink($img_categoria);

            foreach($categoria->catalogos as $catalogo) {
                $img_catalogo = 'img/photos/catalogo/'.$catalogo->portada;
                unlink($img_catalogo);
                foreach($catalogo->galeria as $galeria) {
                    $img_galeria = 'img/photos/catalogo/galerias/'.$galeria->imagen;
                    unlink($img_galeria);
                    $galeria->delete();
                }

                foreach($catalogo->caracteristicas as $caracteristica) { $caracteristica->delete(); }

                $catalogo->delete();
            }

            $categoria->delete();

            return response()->json(['success' => true, 'message' => 'Catálogo eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el catálogo.'], 500);
        }
    }
}



