<?php

    namespace App\Http\Controllers;

    use App\Catalogo;
    use App\CatalogoGaleria;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    class CatalogoGaleriasController extends Controller
    {
        public function index(Catalogo $catalogo)
        {
            $galerias = CatalogoGaleria::where('catalogo_id', $catalogo->id)->get()->toBase();
            return view('config.secciones.catalogos.galeria', compact('galerias', 'catalogo'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'imagenes' => 'required|array',
                'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $galerias = [];
            foreach ($request->file('imagenes') as $file) {
                $galeria = new CatalogoGaleria;
                $extension_galeria = $file->getClientOriginalExtension();
                $namefile_galeria = Str::random(30) . '.' . $extension_galeria;

                Storage::disk('local')->put("img/photos/catalogo/galerias/" . $namefile_galeria, \File::get($file));

                $galeria->catalogo_id = $request->catalogo_id;
                $galeria->imagen = $namefile_galeria;
                $galeria->save();

                $galerias[] = [
                    'id' => $galeria->id,
                    'imagen' => $galeria->imagen,
                ];
            }

            return response()->json(['success' => true, 'message' => 'Imágenes añadidas', 'galerias' => $galerias]);
        }

        public function destroy(CatalogoGaleria $galeria)
        {
            $img = 'img/photos/catalogo/galerias/' . $galeria->imagen;
            if (file_exists($img)) {
                unlink($img);
            }
            $galeria->delete();

            return response()->json(['success' => true, 'message' => 'Imagen eliminada']);
        }
    }


