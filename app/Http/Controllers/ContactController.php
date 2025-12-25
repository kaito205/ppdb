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

    public function index(Request $request)
    {
        if ($request->has('open')) {
            $message = Contact::find($request->open);
            if ($message && !$message->is_read) {
                $message->is_read = true;
                $message->save();
            }
        }

        $messages = Contact::latest()->get();
        return view('admin.pesan', compact('messages'));
    }

    public function markAsRead($id)
    {
        $message = Contact::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return response()->json(['success' => true]);
    }

    public function getUnreadCount()
    {
        $messageCount = Contact::where('is_read', false)->count();
        $pendaftaranCount = \App\Models\Pendaftaran::where('is_read', false)->count();
        
        return response()->json([
            'messageCount' => $messageCount,
            'pendaftaranCount' => $pendaftaranCount
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
