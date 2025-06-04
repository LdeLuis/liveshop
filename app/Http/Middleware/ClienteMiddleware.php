<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('cliente_id')) {
            return redirect('/cliente/login')->with('error', 'Debes iniciar sesión como cliente.');
        }

        return $next($request);
    }
}

