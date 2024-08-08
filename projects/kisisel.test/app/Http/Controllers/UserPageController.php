<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminPage;

class UserPageController extends Controller
{
    public function index()
    {
        $pages = AdminPage::all();
        return view('template', ['pages' => $pages]); // 'template' şablonuna gönder
    }
}
