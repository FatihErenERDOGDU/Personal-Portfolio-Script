<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class CommunicationController extends Controller
{
    public function index()
    {
        // Kullanıcılara iletişim formunu göster
        return view('communication');
    }

    public function send(Request $request)
    {
        // Form verilerini doğrula
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Form verilerini veritabanına kaydet
        Contact::create($request->all());

        // Başarılı form gönderimi sonrası geri bildirim
        return redirect()->route('communication')->with('success', 'Mesajınız başarıyla gönderildi!');
    }

    public function adminIndex()
    {
        // Admin için iletişim mesajlarını sayfalayarak çek
        $contacts = Contact::paginate(10);
        return view('admin.contact', compact('contacts'));
    }

    public function destroy($id)
    {
        // İlgili mesajı bul ve sil
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contact')->with('success', 'Mesaj başarıyla silindi!');
    }
}
