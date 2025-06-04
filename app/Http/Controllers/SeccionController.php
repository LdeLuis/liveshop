<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Seccion;
use App\Elemento;
use App\Faq;
use App\Politica;
use App\SliderPrincipal;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Blog;
use App\Tematica;
use App\Marca;
use App\Talla;
use App\Imagen;
use App\Usuario;
use App\Ubicacion;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seccion = Seccion::all();
        return view('config.secciones.index', compact('seccion'));
    }

    public function show($seccion) {
        $config = Configuracion::first();
		$seccion = Seccion::where('slug',$seccion)->first();
        $elements = Elemento::where('seccion',$seccion->id)->get()->toBase();
        $elem_general = Elemento::all();
        $faqs = Faq::all();
        $sliders = SliderPrincipal::all();
        $politicas = Politica::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $imagen = Imagen::all();
        $ubi = Ubicacion::all();
        $ticket = Ticket::all();
        $users = User::all();
        $catalogo_caracteristicas = CatalogoCaracteristicas::all();
        $catalogo_galeria = CatalogoGaleria::all();
        $tematicas = Tematica::where('activo', 1)->get()->toBase();
        $blogs = Blog::where('activo', 1)->get()->toBase();

        $catalogos = Catalogo::with(['imagenes'])->get();


        if($seccion->seccion == 'configuracion') { 
            $ruta = 'config.general.contacto';
        } else if($seccion->seccion == 'politicas') {
            $ruta = 'config.politicas.index';
        } else if($seccion->seccion == 'faqs') {    
            $ruta = 'config.faqs.index';
        } else {
            $ruta = 'config.secciones.'.$seccion->seccion;
        }

        return view($ruta, compact('seccion', 'config', 'elem_general', 'faqs', 'politicas', 'elements', 'sliders', 'categorias', 'catalogos', 'catalogo_caracteristicas', 'catalogo_galeria', 'tematicas', 'blogs','marcas','imagen','ubi','ticket','users'));
    }

    public function textglobalseccion(Request $request){
        if (empty($request->tabla)) {
            return false;
        }

        $nameSpace = '\\App\\';
        $model = $nameSpace . ucfirst($request->tabla);

        $field = $request->campo;
        $val = $request->valor;
        // $model = $model::find($request->id);
        // $model->$field = $request->valor;
        // $model->save();

        // $model::find($request->id)->update(["$field" => "$val"]);
        if ($model::find($request->id)->update(["$field" => "$val"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            // code...
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
        // return $request->valor;
    }

    public function cambiar_imagen_seccion(Request $request) {
        $elemento = Elemento::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/home/' . $elemento->imagen;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/home/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $elemento->imagen = $namefile;
        $elemento->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();
    }

    public function cambiar_imagen_seccion_2(Request $request) {
        $catalogo = Imagen::find($request->id_imagen);
        
        $file = $request->file('archivo');

        // Verifica si existe un archivo antiguo y elimínalo
        $oldFile = 'img/photos/catalogo/' . $catalogo->imagen;
        if (Storage::disk('local')->exists($oldFile)) {
            Storage::disk('local')->delete($oldFile);
        }

        // Genera el nombre del nuevo archivo y almacénalo
        $extension = $file->getClientOriginalExtension();
        $namefile = Str::random(30) . '.' . $extension;
        $path = 'img/photos/catalogo/' . $namefile;

        // Almacena el nuevo archivo
        Storage::disk('local')->put($path, file_get_contents($file));

        // Actualiza el registro con el nuevo nombre de archivo
        $catalogo->imagen = $namefile;
        $catalogo->save();

        // Mensaje de éxito y redirección
        \Toastr::success('Guardado');
        return redirect()->back();
    }

    public function agregar_seccion(Request $request){
        $marcas = new Marca;

        // Manejo del primer archivo 'archivo'
        $file_marca = $request->file('archivo');
        $extension_marca = $file_marca->getClientOriginalExtension();
        $namefile_marca = Str::random(30) . '.' . $extension_marca;
        \Storage::disk('local')->put("img/photos/marca/" . $namefile_marca, \File::get($file_marca));

        // Asignación de datos a las propiedades del catálogo
        // $marcas->nombre = $request->nombre;
        // $marcas->comentario = $request->comentario;
         $marcas->imagen = $namefile_marca; 

        // Guardar el catálogo
        if ($marcas->save()) {
            \Toastr::success('Marca agregada');
            return redirect()->back();
        } else {
            \Toastr::error('Error al agregar marca');
            return redirect()->back();
        }
    }

    public function agregar_seccion_2(Request $request)
    {
        $catalogo = new Catalogo;

        $catalogo->nombre = $request->nombre;
        $catalogo->precio = $request->precio;
        $catalogo->descripcion = $request->descripcion;
        $catalogo->tipo = $request->tipo;
        $catalogo->estado = 'liberado'; // Aquí se asigna automáticamente

        if ($catalogo->save()) {
            $idProducto = $catalogo->id;

            // Guardar imágenes
            if ($request->hasFile('imagenes')) {
                foreach ($request->file('imagenes') as $imagen) {
                    $nombreImagen = Str::random(30) . '.' . $imagen->getClientOriginalExtension();
                    \Storage::disk('local')->put("img/photos/catalogo/" . $nombreImagen, \File::get($imagen));

                    \App\Imagen::create([ 
                        'seccion' => $idProducto,
                        'imagen' => $nombreImagen
                    ]);
                }
            }

            // Guardar tallas
            if ($request->has('tallas')) {
                foreach ($request->tallas as $talla) {
                    \App\Talla::create([
                        'seccion' => $idProducto,
                        'talla' => $talla['talla'],
                        'cantidad' => $talla['cantidad']
                    ]);
                }
            }

            \Toastr::success('Producto agregado correctamente con imágenes y tallas.');
            return redirect()->back();
        } else {
            \Toastr::error('Error al guardar el producto.');
            return redirect()->back();
        }
    }

    public function agregar_seccion_3(Request $request){
        $tallas = new Talla;

        $tallas->seccion = $request->seccion;
        $tallas->talla = $request->talla;
        $tallas->cantidad = $request->cantidad;

        // Guardar el catálogo
        if ($tallas->save()) {
            \Toastr::success('talla agregada');
            return redirect()->back();
        } else {
            \Toastr::error('Error al agregar talla');
            return redirect()->back();
        }
    }

    public function agregar_seccion_4(Request $request){
        $imgs = new Imagen;

        // Manejo del primer archivo 'archivo'
        $file_marca = $request->file('archivo');
        $extension_marca = $file_marca->getClientOriginalExtension();
        $namefile_marca = Str::random(30) . '.' . $extension_marca;
        \Storage::disk('local')->put("img/photos/catalogo/" . $namefile_marca, \File::get($file_marca));

        $imgs->seccion = $request->seccion;
        $imgs->imagen = $namefile_marca;

        // Guardar el catálogo
        if ($imgs->save()) {
            \Toastr::success('Imagen agregada');
            return redirect()->back();
        } else {
            \Toastr::error('Error al agregar imagen');
            return redirect()->back();
        }
    }

    public function agregar_seccion_5(Request $request)
    {
        $usuarios = new Usuario;

        $usuarios->nombre = $request->nombre;
        $usuarios->email = $request->email;
        $usuarios->password = bcrypt($request->password); // Encriptar la contraseña

        if ($usuarios->save()) {
            \Toastr::success('Usuario agregado');
            return redirect()->back();
        } else {
            \Toastr::error('Error al agregar usuario');
            return redirect()->back();
        }
    }

    public function agregar_seccion_6(Request $request)
    {
        $ubi = new Ubicacion;

        $ubi->nombre = $request->nombre;
        $ubi->descripcion = $request->descripcion;
        $ubi->url = $request->url;

        if ($ubi->save()) {
            \Toastr::success('Ubicación agregada');
            return redirect()->back();
        } else {
            \Toastr::error('Error al agregar ubicación');
            return redirect()->back();
        }
    }

    public function destroy($id){
        $marcas = Marca::find($id);
        try {

            $img_marca_imagen = 'img/photos/marca/' . $marcas->imagen;
            unlink($img_marca_imagen);
           
            $marcas->delete();

            \Toastr::success('Se elimino marca');
            return redirect()->back();
        } catch (\Exception $e) {
            \Toastr::success('Error al eliminar la marca');
            return redirect()->back();
        }
    }

    public function destroy_tallas($id){
        $tallas = Talla::find($id);
        try {

            $tallas->delete();

            \Toastr::success('Se elimino talla');
            return redirect()->back();
        } catch (\Exception $e) {
            \Toastr::success('Error al eliminar la talla');
            return redirect()->back();
        }
    }

    public function destroy_img($id){
        $img = Imagen::find($id);
        try {

            $img_marca_imagen = 'img/photos/catalogo/' . $img->imagen;
            unlink($img_marca_imagen);
           
            $img->delete();

            \Toastr::success('Se elimino imaggen');
            return redirect()->back();
        } catch (\Exception $e) {
            \Toastr::success('Error al eliminar la imagen');
            return redirect()->back();
        }
    }

    public function destroy_ubi($id){
        $ubi = Ubicacion::find($id);
        try {

            $ubi->delete();

            \Toastr::success('Se elimino ubicación');
            return redirect()->back();
        } catch (\Exception $e) {
            \Toastr::success('Error al eliminar la ubicación');
            return redirect()->back();
        }
    }


    public function ubicaciones(){
        $config = Configuracion::first();
        $ubi = ubicacion::all();

        return view('seccion.ubicaciones', compact('config','ubi'));
    }

   public function tickets(){
        $config = Configuracion::first();
        $ticket = Ticket::all();
        $users = User::all(); 
        $ubi = ubicacion::all();

        return view('seccion.tickets', compact('config', 'ticket', 'users', 'ubi'));
    }

    public function updateEstado(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $request->validate([
            'estado' => 'required|in:Pendiente,Completado',
        ]);

        $ticket->estado = $request->estado;
        $ticket->save();

        \Toastr::success('Se actualizo el estado del ticket');
        return redirect()->back()->with('success', 'Estado del ticket actualizado correctamente.');
    }



}
