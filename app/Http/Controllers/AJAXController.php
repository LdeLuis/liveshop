<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Categoria;
use App\Catalogo;
use App\Elemento;

class AJAXController extends Controller
{
    public function editarajax(Request $request)
    {
        $modelName = $request->input('modelo');
        $id = $request->input('id');

        $modelPath = "\\App\\" . $modelName;

        if (!class_exists($modelPath)) {
            return response()->json(['error' => 'Modelo no encontrado'], 404);
        }

        try {
            $model = $modelPath::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        $field = $request->input('field');
        $value = $request->input('value');

        // Validación y sanitización

        $model->$field = $value;
        $model->save();

        return response()->json(['success' => 'Actualizado correctamente']);
    }
    
    public function switch_inicio(Request $request){
        $catalalogo = Catalogo::find($request->id);
        $catalalogo_des = Catalogo::where('inicio',1)->count();

        if($catalalogo_des == 4)
            if($request->valor == 'true')
                return response()->json(['success'=>false, 'mensaje'=>'No puedes agregar mas de 4 productos destacados']);

        if($request->valor == 1) {
            $catalalogo->inicio = 1;
            if($catalalogo->save())
                return response()->json(['success'=>true, 'mensaje'=>'Se agrego a destacados']);
            else
                return response()->json(['success'=>false, 'mensaje'=>'Error al agregar']);
        } else {
            $catalalogo->inicio = 0;
            if($catalalogo->save())
                return response()->json(['success'=>true, 'mensaje'=>'Se removio de destacados']);
            else
                return response()->json(['success'=>false, 'mensaje'=>'Error al remover']);
        }
    }

    public function switch_visible(Request $request){
        $catalalogo = Catalogo::find($request->id);

        if($request->valor == 1) {
            $catalalogo->visible = 1;
            if($catalalogo->save())
                return response()->json(['success'=>true, 'mensaje'=>'Estatus: Público, los clientes pueden ver este producto']);
            else
                return response()->json(['success'=>false, 'mensaje'=>'Error al cambiar el estatus']);
        } else {
            $catalalogo->visible = 0;
            if($catalalogo->save())
                return response()->json(['success'=>true, 'mensaje'=>'Estatus: Privado, los clientes no pueden ver este producto']);
            else
                return response()->json(['success'=>false, 'mensaje'=>'Error al remover']);
        }
    }

    public function cambiar_imagen(Request $request) {
        if($request->tipo_imagen == 'contacto_home') {
            $elemento = Elemento::find($request->id_imagen);
            $file = $request->file('archivo');
            $oldFile = 'img/photos/imagenes_estaticas/'.$elemento->imagen;
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("img/photos/imagenes_estaticas/" . $namefile, \File::get($file));
            unlink($oldFile);  

            $elemento->imagen = $namefile;
            $elemento->update();

            \Toastr::success('Guardado');
            return redirect()->back();
        } else if($request->tipo_imagen == 'categoria_imagen') {
            dd("Llegue");
        } else {
            dd('no llego');
        }
    }

    public function cambiar_imagen_categoria(Request $request) {
        $elemento = Categoria::find($request->id_imagen);
        $file = $request->file('imagen');
        $oldFile = public_path('img/photos/categorias/' . $elemento->portada);
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
    
        \Storage::disk('local')->put("img/photos/categorias/" . $namefile, \File::get($file));
        if(file_exists($oldFile)) {
            unlink($oldFile);  
        }
    
        $elemento->portada = $namefile;
        $elemento->update();
    
        return response()->json([
            'success' => true,
            'id' => $elemento->id,
            'new_image_url' => asset('img/photos/categorias/' . $namefile)
        ]);
    }
    

}
