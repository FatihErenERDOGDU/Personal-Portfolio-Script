<?php
namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
public function index()
{
$about = About::first(); // Tek bir kayıt al
return view('admin.about', compact('about'));
}

public function store(Request $request)
{
$validatedData = $request->validate([
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Görsel doğrulama kuralları
'text' => 'required|string',
]);

$about = About::first(); // Tek bir kayıt güncellenir veya oluşturulur

if (!$about) {
$about = new About();
}

if ($request->hasFile('image')) {
// Önceki görseli sil (varsa)
if ($about->image) {
Storage::delete('public/uploads/' . $about->image);
}

// Yeni görseli kaydet
$imagePath = $request->file('image')->store('public/uploads');
$about->image = basename($imagePath);
}

$about->text = $validatedData['text'];
$about->save();

return redirect()->route('admin.about')->with('success', 'About information updated successfully.');
}
}
