<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\SliderPrincipal;

class SliderPrincipalController extends Controller
{
    public function index() {

    }

    public function store(Request $request) {
        $sliders = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $file_slider) {
                $slider = new SliderPrincipal;
                $extension_slider = $file_slider->getClientOriginalExtension();
                $namefile_slider = Str::random(30) . '.' . $extension_slider;
                Storage::disk('local')->put("img/photos/sliders/" . $namefile_slider, \File::get($file_slider));

                $slider->imagen = $namefile_slider;
                $slider->save();

                $sliders[] = [
                    'id' => $slider->id,
                    'url' => asset('img/photos/sliders/' . $namefile_slider)
                ];
            }
        }

        return response()->json([
            'message' => 'Imágenes añadidas',
            'sliders' => $sliders
        ]);
    }

    
    public function destroy(SliderPrincipal $slider) {
        $img = 'img/photos/sliders/'.$slider->imagen;
        if (file_exists($img)) {
            unlink($img);
        }
        $slider->delete();
    
        return response()->json(['message' => 'Imágen eliminada']);
    }
}
