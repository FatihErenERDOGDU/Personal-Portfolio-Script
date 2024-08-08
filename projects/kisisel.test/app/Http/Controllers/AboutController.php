<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
public function index()
{
$about = About::first();
return view('about', compact('about'));
}

public function create()
{
return view('admin.about'); // Form sayfasının yolu
}

public function store(Request $request)
{
// Validation işlemleri
$request->validate([
'image' => 'required|string',
'text' => 'required|string',
]);

// Yeni veri oluşturma ve veritabanına kaydetme
$about = new About;
$about->image = $request->image;
$about->text = $request->text;
$about->save();

return redirect()->route('about.create')->with('success', 'About information has been added successfully.');
}
}
