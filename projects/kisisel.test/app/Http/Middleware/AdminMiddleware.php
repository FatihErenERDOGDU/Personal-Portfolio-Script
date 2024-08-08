<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Kullanıcı oturum açmışsa
        if (Auth::check()) {
            // Eğer istek login sayfasından geliyorsa, kullanıcıyı ana sayfaya yönlendir
            if ($request->is('login')) {
                return redirect('/'); // veya başka uygun bir sayfa
            }

            // Giriş yapmış kullanıcılar için admin sayfalarına erişime devam et
            return $next($request);
        }

        // Kullanıcı oturum açmamışsa giriş sayfasına yönlendir
        return redirect('/login');
    }
}
