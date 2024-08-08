<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function blog()
    {
        return view('admin.blog');
    }

    public function about()
    {
        return view('admin.about');
    }

    public function skills()
    {
        return view('admin.skills');
    }

    public function contact()
    {
        return view('admin.contact');
    }
}
