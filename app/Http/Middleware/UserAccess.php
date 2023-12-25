<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // if (auth()->check() && auth()->user()->type == $userType) {
        //     return $next($request);
        // }
        
        // switch ($userType) {
        //     case 'superadmin':
        //         return redirect()->route('home');
        //     case 'ahligizi':
        //         return redirect()->route('ahligizi.home');
        //     case 'pramusaji':
        //         return redirect()->route('pramusaji.home');
        //     case 'distributor':
        //         return redirect()->route('distributor.home');
        //     // tambahkan tipe pengguna lainnya jika diperlukan
        //     default:
        //         return response()->json(['error' => 'Anda tidak memiliki izin untuk mengakses halaman ini.']);
        // }

        if(auth()->user()->type == $userType){
            return $next($request);
        }
            
        abort(403, 'YEHEHE KACIHAN TIDAK MEMILIKI AKSES :D');
        /* return response()->view('errors.check-permission'); */
    }
}
