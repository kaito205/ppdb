<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function home()
    {
        $ekskul = Ekstrakurikuler::all();
        return view('main.dashboard', compact('ekskul'));
    }

    public function index()
    {
        $data = Ekstrakurikuler::all();
        return view('admin.ekskul.index', compact('data'));

    }

    public function create()
    {
        return view('admin.ekskul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $ekskul = new Ekstrakurikuler();
        $ekskul->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ekskul'), $namaFile);
            $ekskul->foto = $namaFile;
        }

        $ekskul->save();

        return redirect()->route('admin.ekskul')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekskul.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $ekskul->nama = $request->nama;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/ekskul'), $namaFile);
            $ekskul->foto = $namaFile;
        }

        $ekskul->save();

        return redirect()->route('admin.ekskul')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        Ekstrakurikuler::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
