<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
public function index()
{
// Veritabanından tüm iletişim mesajlarını alır
$contacts = Contact::all();
return view('admin.contact', compact('contacts'));
}
}
