<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Obtenemos todos los parámetros
        // $roles = array_slice(func_get_args(),2);
        foreach ($roles as $role) {
           if (auth()->user()->hasRole($role)) {
            return $next($request);
           }
        }
        abort(403);
    }
}
