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
     * $roles bisa berisi satu role atau beberapa role dipisah koma
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role; // berisi nilai role sesuai login user

        // support multiple roles, mis. 'admin-dosen'
        $allowed = explode('-', $roles); // isi dari $roles di convert jadi array

        if (!in_array($userRole, $allowed)) {
            abort(403, 'Anda tidak memiliki hak akses.');
        }

        return $next($request); // lanjut akses ke halaman di routes
    }
}
