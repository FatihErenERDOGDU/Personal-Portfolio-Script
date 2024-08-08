<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    // Listeleme
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills', compact('skills'));
    }

    // Yeni formu gösterme
    public function create()
    {
        return view('admin.create_skill'); // resources/views/admin/create_skill.blade.php
    }

    // Yeni skill ekleme
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'progress' => 'required|integer|min:0|max:100',
            'description' => 'required|string',
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill added successfully.');
    }

    // Skill düzenleme formu
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.edit_skills', compact('skill'));
    }

    // Skill güncelleme
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'progress' => 'required|integer|min:0|max:100',
            'description' => 'required|string',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    // Skill silme
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
