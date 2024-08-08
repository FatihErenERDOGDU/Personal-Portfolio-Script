<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function editHeader()
    {
        $settings = Setting::first();
        return view('admin.settings.header_edit', compact('settings'));
    }

    public function updateHeader(Request $request)
    {
        $request->validate([
            'logo_url' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
        ]);

        $settings = Setting::first();

        if ($request->hasFile('logo_url')) {
            if ($settings && $settings->logo_url) {
                Storage::delete('public/' . $settings->logo_url);
            }
            $logoPath = $request->file('logo_url')->store('logo', 'uploads');
        } else {
            $logoPath = $settings ? $settings->logo_url : null;
        }

        $settings->update([
            'logo_url' => $logoPath,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
        ]);

        return redirect()->route('admin.settings.header.edit')->with('success', 'Header settings updated successfully.');
    }
}
