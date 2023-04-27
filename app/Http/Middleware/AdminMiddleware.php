<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware{
    public function handle(Request $request, Closure $next){
        if (!$request->session()->has('admin')) {
            // Redirigimos al usuario a la página de inicio de sesión
            return redirect()->route('formAdmin')->with('error', 'No tienes permisos de administrador para ver esta página!');
        }

        return $next($request);
    }
}

?>