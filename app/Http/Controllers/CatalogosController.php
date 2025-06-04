<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\Categoria;
use App\Talla;
use App\Imagen;
use App\Elemento;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function index()
    {
        // Ya se encuentra en secciones, no es necesario definirlo
    }

    public function create()
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();

        return view('config.secciones.catalogos.create', compact('categorias', 'tallas'));
    }

    public function store(Request $request)
    {
        $catalogo = new Catalogo;

        $file_catalogo = $request->file('archivo');
        $extension_catalogo = $file_catalogo->getClientOriginalExtension();
        $namefile_catalogo = Str::random(30) . '.' . $extension_catalogo;

        \Storage::disk('local')->put("img/photos/catalogo/" . $namefile_catalogo, \File::get($file_catalogo));

        $catalogo->categoria_id = $request->categoria;
        $catalogo->talla_id = $request->talla;
        $catalogo->nombre = $request->nombre;
        $catalogo->portada = $namefile_catalogo;
        $catalogo->largo = $request->largo;
        $catalogo->ancho = $request->ancho;
        $catalogo->alto = $request->alto;
        $catalogo->activo = 1;
        $catalogo->visible = 0;
        $catalogo->inicio = 0;

        $catalogo->save();

        $caracteristicas = $request->input('caracteristicas');

        foreach ($caracteristicas as $caracteristica) {
            CatalogoCaracteristicas::create([
                'caracteristica' => $caracteristica, 
                'catalogo_id' => $catalogo->id
            ]);
        }

        \Toastr::success('Brincolin creado con éxito');
        return redirect()->route('seccion.show', ['slug' => 'catalogo']);
    }

    public function show(Catalogo $catalogo)
    {
        return view('config.secciones.catalogos.show', compact('catalogo'));
    }

    public function edit(Catalogo $catalogo)
    {
        $categorias = Categoria::all();
        $tallas = Talla::all();
        
        return view('config.secciones.catalogos.edit', compact('categorias', 'tallas', 'catalogo'));
    }

    public function update(Request $request, Catalogo $catalogo)
    {
        $request->validate([
            'categoria' => 'required',
            'talla' => 'required',
            'nombre' => 'required|string|max:255',
            'largo' => 'nullable|numeric',
            'ancho' => 'nullable|numeric',
            'alto' => 'nullable|numeric',
            'caracteristicas.*' => 'nullable|string|max:255',
            'archivo' => 'nullable|image|max:2048',
        ]);
    
        try {
            $catalogo->categoria_id = $request->categoria;
            $catalogo->talla_id = $request->talla;
            $catalogo->nombre = $request->nombre;
            $catalogo->largo = $request->largo;
            $catalogo->ancho = $request->ancho;
            $catalogo->alto = $request->alto;
    
            if ($request->hasFile('archivo')) {
                if ($catalogo->portada && Storage::exists('img/photos/catalogo/' . $catalogo->portada)) {
                    Storage::delete('img/photos/catalogo/' . $catalogo->portada);
                }
    
                $file_catalogo = $request->file('archivo');
                $namefile_catalogo = Str::random(30) . '.' . $file_catalogo->getClientOriginalExtension();
                Storage::disk('local')->put("img/photos/catalogo/" . $namefile_catalogo, File::get($file_catalogo));
                $catalogo->portada = $namefile_catalogo;
            }
    
            $catalogo->save();
    
            $caracteristicas = $request->input('caracteristicas', []);
            foreach ($caracteristicas as $caracteristica) {
                if (!empty($caracteristica)) {
                    $existingCaracteristica = CatalogoCaracteristicas::where('catalogo_id', $catalogo->id)->where('caracteristica', $caracteristica)->first();

                    if (!$existingCaracteristica) {
                        CatalogoCaracteristicas::create([
                            'caracteristica' => $caracteristica,
                            'catalogo_id' => $catalogo->id,
                        ]);
                    }
                }
            }
            
            \Toastr::success('Brincolin actualizado con éxito');
            return redirect()->route('seccion.show', ['slug' => 'catalogo']);
        } catch (\Exception $e) {
            \Toastr::error('Error al actualizar el Brincolin');
            return redirect()->back()->withInput();
        }
    }
    
    public function deactivate(Catalogo $catalogo)
    {
        try {
            $catalogo->activo = 0;
            $catalogo->update();
    
            return response()->json(['success' => true,  'message' => 'Catálogo eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el catálogo.'], 500);
        }
    }

    public function activate(Catalogo $catalogo)
    {
        try {
            $catalogo->activo = 1;
            $catalogo->update();
    
            return response()->json(['success' => true,  'message' => 'Catálogo eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el catálogo.'], 500);
        }
    }

    public function destroy($id)
    {
        // Buscar el catálogo por ID
        $catalogo = Catalogo::find($id);
    
        // Verificar si el catálogo existe
        if (!$catalogo) {
            \Toastr::error('Producto no encontrado');
            return redirect()->back();
        }
    
        // Obtener las imágenes asociadas al catálogo
        $imagenes = Imagen::where('seccion', $catalogo->id)->get();
        
        // Obtener las tallas asociadas al catálogo
        $tallas = Talla::where('seccion', $catalogo->id)->get();
    
        try {
            // Eliminar las imágenes físicas
            foreach ($imagenes as $imagen) {
                $img_catalogo_imagen = 'img/photos/catalogo/' . $imagen->imagen;
                
                // Verificar si la imagen existe y eliminarla
                if (Storage::exists($img_catalogo_imagen)) {
                    Storage::delete($img_catalogo_imagen);
                }
            }
    
            // Eliminar las imágenes y tallas de la base de datos
            $imagenes->each->delete();
            $tallas->each->delete();
    
            // Eliminar el catálogo
            $catalogo->delete();
    
            // Mensaje de éxito
            \Toastr::success('Se eliminó el producto correctamente');
            return redirect()->back();
        } catch (\Exception $e) {
            // Manejo de errores
            \Toastr::error('Error al eliminar el producto: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function productos($id){
        $catalogo = Catalogo::find($id);
        $img = Imagen::where('seccion', $catalogo->id)->get();
        $talla = Talla::where('seccion', $catalogo->id)->get();
        $elements = Elemento::where('seccion', 7)->get();
        
        return view('config.secciones.producto', compact('catalogo','img','talla','elements'));

    }
}


