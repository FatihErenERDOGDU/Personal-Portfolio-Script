<?php

// app/Http/Controllers/Auth/LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


public function showLoginForm()
{
return view('auth.login');
}

public function login(Request $request)
{
// Validasyon kuralları
$request->validate([
'email' => 'required|email',
'password' => 'required',
]);

// Kimlik doğrulama bilgilerini al
$credentials = $request->only('email', 'password');

// Kimlik doğrulama işlemi
if (Auth::attempt($credentials)) {
// Giriş başarılı, dashboard'a yönlendir
return redirect()->intended('dashboard');
}

// Giriş başarısız, hata mesajı ile geri dön
return back()->withErrors([
'email' => 'The provided credentials do not match our records.',
]);
}
}
