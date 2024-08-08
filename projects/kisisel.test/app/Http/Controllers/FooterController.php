<?php
// app/Http/Controllers/FooterController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = Footer::first(); // İlk kaydı alıyoruz

        return view('admin.footer_edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $footer = Footer::first();
        if ($footer) {
            $footer->update($request->except('logo'));

// Logo güncelleniyorsa işlemi yap
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('footers', 'public');
                $footer->update(['logo' => $logoPath]);
            }
        } else {
            $footerData = $request->except('logo');
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('footers', 'public');
                $footerData['logo'] = $logoPath;
            }
            Footer::create($footerData);
        }

        return redirect()->route('admin.footer.edit')->with('success', 'Footer ayarları başarıyla güncellendi.');
    }
}
