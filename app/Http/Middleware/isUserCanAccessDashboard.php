<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUserCanAccessDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return $next($request);
            } else {
                toastr()->warning("Hanya Admin Yang Boleh Mengakses Dashboard", "Akses Ditolak");
                return redirect('login-dashboard');
            }
        } else {
            toastr()->error("Harap Login Terlebih Dahulu Sebelum Akses Dashboard", "Akses Ditolak");
            return redirect('login-dashboard');
        }

    }
}
