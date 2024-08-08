<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        // Veritabanından deneyimleri çek
        $experiences = Experience::all();


        // Blade şablonuna gönder
        return view('index', compact('experiences'));
    }
}
