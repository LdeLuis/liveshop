<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\User;
use App\Ticket;
use App\Imagen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $config = Configuracion::first();
        $usuario = User::find($user_id);
        $tickets = Ticket::where('usuario', $user_id)->get();

        foreach ($tickets as $ticket) {
            $productos = json_decode($ticket->productos, true);

            foreach ($productos as &$producto) {
                $imagen = \App\Imagen::where('seccion', $producto['id'])->first();
                $producto['imagen_url'] = $imagen 
                    ? asset('img/photos/catalogo/' . $imagen->imagen) 
                    : asset('img/design/recursos/nike.png');
            }

            $ticket->productos_array = $productos;
        }

        return view('user.home', compact('config', 'usuario', 'tickets'));
    }



    public function update(Request $request)
    {
        $user = Auth::user(); 

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'calle' => ['required', 'string', 'max:255'],
            'next' => ['required', 'string', 'max:255'],
            'nint' => ['nullable', 'string', 'max:255'],
            'entrecalles' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],
            'colonia' => ['required', 'string', 'max:255'],
            'codigop' => ['required', 'string', 'max:10'],
        ]);

        // Actualiza los datos
        $user->update($request->all());

        return redirect()->back()->with('success', 'Datos actualizados correctamente.');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Contraseña actualizada correctamente.');
    }


    public function actualizarImagen(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->getClientOriginalExtension();
            $nombreArchivo = Str::random(30) . '.' . $extension;

            // Eliminar imagen anterior si existe
            if ($user->foto && Storage::disk('local')->exists('img/photos/usuarios/' . $user->foto)) {
                Storage::disk('local')->delete('img/photos/usuarios/' . $user->foto);
            }

            // Guardar nueva imagen
            Storage::disk('local')->put('img/photos/usuarios/' . $nombreArchivo, file_get_contents($foto));

            // Actualizar en BD
            $user->foto = $nombreArchivo;
            $user->save();
        }

        return redirect()->back()->with('success', 'Imagen actualizada correctamente.');
    }



}
