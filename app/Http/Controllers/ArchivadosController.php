<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Categoria;
use App\Catalogo;
use App\CatalogoCaracteristicas;
use App\CatalogoGaleria;
use App\Tematica;

class ArchivadosController extends Controller
{
    public function archivados_categorias()
    {
        $categorias = Categoria::where('activo', 0)->get()->toBase();

        return view('config.secciones.catalogos.archivado_categorias', compact('categorias'));
    }

    public function archivados_catalogos()
    {
        $categorias = Categoria::all();
        $catalogos = Catalogo::where('activo', 0)->get()->toBase();

        return view('config.secciones.catalogos.archivado_catalogos', compact('catalogos', 'categorias'));
    }

    public function archivados_tematicas()
    {
        $tematicas = Tematica::where('activo', 0)->get()->toBase();

        return view('config.secciones.blogs.archivado_tematicas', compact('tematicas'));
    }

    public function archivados_blogs()
    {
        $tematicas = Tematica::all();
        $blogs = Blog::where('activo', 0)->get()->toBase();

        return view('config.secciones.blogs.archivado_blogs', compact('blogs', 'tematicas'));
    }
}
