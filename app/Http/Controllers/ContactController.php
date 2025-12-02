<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }

    public function index()
    {
        $messages = Contact::latest()->get();
        return view('admin.pesan', compact('messages'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
