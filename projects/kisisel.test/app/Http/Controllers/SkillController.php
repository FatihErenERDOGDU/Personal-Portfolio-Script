<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    // Admin panelindeki yetenekleri listeleme ve formu gösterme
    public function index()
    {
        $skills = Skill::all(); // Tüm yetenekleri al
        return view('skills', compact('skills'));
    }

}
