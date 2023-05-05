<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authUserRole = (Auth::user()->roles)[0]->role;
        if ($authUserRole === "ROLE_ADMIN") {
            return $next($request);
        } else {
            abort(response()->json(['message' => 'pas autorisé car vous n\'êtes pas un administrateur !!']));
        }
    }
}
