<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $url = $request->path();
        if (preg_match('/^admin/', $url)) {
            if ($user->role == 'admin') {
                return $next($request);
            } else {
                abort(403);
            }
        }
        if (preg_match('/^docteur/', $url)) {
            if ($user->role == 'docteur') {
                return $next($request);
            } else {
                abort(403);
            }
        }
        if (preg_match('/^secretaire/', $url)) {
            if ($user->role == 'secretaire') {
                return $next($request);
            } else {
                abort(403);
            }
        }
    }
}
