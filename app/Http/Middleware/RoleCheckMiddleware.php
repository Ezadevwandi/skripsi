<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            // dd($role);
            switch ($role) {
                case 'Admin':
                    return redirect()->route('document-types.index');
                case 'Pimpinan':
                    return redirect()->route('pimpinan.dashboard');
                case 'PM':
                    return redirect()->route('pm.dashboard');
                case 'Karyawan':
                    return redirect()->route('karyawan.dashboard');
                default:
                    return redirect()->route('home'); // or a default route
            }
        }
    }
}
