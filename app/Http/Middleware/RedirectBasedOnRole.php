<?php

namespace App\Http\Middleware;
use Closure;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next)
    {
        $allowedRoutes = [
            'superadmin' => 'home',
            'ahligizi' => 'ahligizi.home',
            'pramusaji' => 'pramusaji.home',
            'distributor' => 'distributor.home',
            // Tambahkan peran lain jika diperlukan
        ];

        $userRole = auth()->user()->type;

        if (array_key_exists($userRole, $allowedRoutes)) {
            return redirect()->route($allowedRoutes[$userRole]);
        } else {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
    }
}
