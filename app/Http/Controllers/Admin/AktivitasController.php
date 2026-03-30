<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = Aktivitas::latest()->get();
        return view('admin.aktivitas.index', compact('aktivitas'));
    }

    public function show($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('admin.aktivitas.show', compact('aktivitas'));
    }

    public function create()
    {
        return view('admin.aktivitas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'Deskripsi' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('aktivitas', 'public');
        }

        Aktivitas::create($data);

        return redirect()->route('admin.aktivitas.index')
            ->with('success', 'Berhasil ditambah!');
    }

    public function edit($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('admin.aktivitas.edit', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|max:255',
            'Deskripsi' => 'required',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            // hapus lama
            if ($aktivitas->gambar && Storage::disk('public')->exists($aktivitas->gambar)) {
                Storage::disk('public')->delete($aktivitas->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('aktivitas', 'public');
        }

        $aktivitas->update($data);

        return redirect()->route('admin.aktivitas.index')
            ->with('success', 'Berhasil diupdate!');
    }

    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);

        if ($aktivitas->gambar && Storage::disk('public')->exists($aktivitas->gambar)) {
            Storage::disk('public')->delete($aktivitas->gambar);
        }

        $aktivitas->delete();

        return redirect()->route('admin.aktivitas.index')
            ->with('success', 'Berhasil dihapus!');
    }
}