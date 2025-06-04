<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telefono' => ['required', 'string', 'max:255'],
            'calle' => ['required', 'string', 'max:255'],
            'next' => ['required', 'string', 'max:255'],
            'nint' => ['nullable', 'string', 'max:255'], 
            'entrecalles' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],
            'colonia' => ['required', 'string', 'max:255'],
            'codigop' => ['required', 'digits:5'], 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ruta_origen = public_path('img/design/recursos/user-img.png');

        $nombreArchivo = Str::random(30) . '.png';

        Storage::disk('local')->put("img/photos/usuarios/" . $nombreArchivo, File::get($ruta_origen));

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefono' => $data['telefono'],
            'calle' => $data['calle'],
            'next' => $data['next'],
            'nint' => $data['nint'],
            'entrecalles' => $data['entrecalles'],
            'pais' => $data['pais'],
            'estado' => $data['estado'],
            'municipio' => $data['municipio'],
            'colonia' => $data['colonia'],
            'codigop' => $data['codigop'],
            'foto' => $nombreArchivo, 
        ]);
    }

}
