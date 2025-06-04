<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tematica;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $tematicas = Tematica::all();
        return view('config.secciones.blogs.create', compact('tematicas'));
    }

    public function store(Request $request)
    {       
        $descripcion = $request->descripcion;

        $dom = new DOMDocument();
        $dom->loadHTML($descripcion, 9);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key. '.png';

            file_put_contents(public_path().$image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $descripcion = $dom->saveHTML();

        $file_portada = $request->file('portada');
        $extension_portada = $file_portada->getClientOriginalExtension();
        $namefile_portada = Str::random(30) . '.' . $extension_portada;

        \Storage::disk('local')->put("img/photos/blogs/" . $namefile_portada, \File::get($file_portada));

        Blog::create([
            'portada' => $namefile_portada,
            'titulo' => $request->titulo,
            'descripcion' => $descripcion,
            'link_whatsapp' => $request->link_whatsapp,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'tematica_id' => $request->tematica
        ]);

        \Toastr::success('Nuevo post creado');
        return redirect()->route('seccion.show', ['slug' => 'blogs']);
    }

    public function show(Blog $blog)
    {
        return view('config.secciones.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $tematicas = Tematica::all();
        return view('config.secciones.blogs.edit', compact('blog', 'tematicas'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
    
        $descripcion = $request->descripcion;

        $dom = new DOMDocument();
        $dom->loadHTML($descripcion, 9);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $key => $img) {

            if(strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time(). $key. '.png';

                file_put_contents(public_path().$image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $descripcion = $dom->saveHTML();

            \Storage::disk('local')->delete("img/photos/blogs/" . $blog->portada);
    
            $file_portada = $request->file('portada');
            $extension_portada = $file_portada->getClientOriginalExtension();
            $namefile_portada = Str::random(30) . '.' . $extension_portada;
    
            \Storage::disk('local')->put("img/photos/blogs/" . $namefile_portada, \File::get($file_portada));
    
            $blog->portada = $namefile_portada;
    
        $blog->update([
            'portada' => $namefile_portada,
            'titulo' => $request->titulo,
            'descripcion' => $descripcion,
            'link_whatsapp' => $request->link_whatsapp,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'tematica_id' => $request->tematica
        ]);
    
        \Toastr::success('Post actualizado con éxito');
        return redirect()->route('seccion.show', ['slug' => 'blogs']);
    }
    
    public function deactivate(Blog $blog)
    {
        try {
            $blog->activo = 0;
            $blog->update();
    
            return response()->json(['success' => true,  'message' => 'Blog eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el Blog.'], 500);
        }
    }

    public function activate(Blog $blog)
    {
        try {
            $blog->activo = 1;
            $blog->update();
    
            return response()->json(['success' => true,  'message' => 'Blog reactivado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo reactivar el Blog.'], 500);
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            // Borramos las imagenes en el sistema de archivos (eliminación física)
            $img_blog = 'img/photos/blogs/'.$blog->portada;
            unlink($img_blog);

            // Eliminación de la base de datos (eliminación lógica)
            $blog->delete();

            return response()->json(['success' => true, 'message' => 'Blog eliminado.'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'No se pudo eliminar el blog.'], 500);
        }
    }
}
