<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index()
    {
        $visi = VisiMisi::visi()->first();
        $misi = VisiMisi::misi()->get();

        return view('admin.Visi_Misi.index', compact('visi', 'misi'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        return view('admin.Visi_Misi.create');
    }

    // ======================
    // EDIT
    // ======================
    public function edit($id)
    {
        $visiMisi = VisiMisi::findOrFail($id);
        return view('admin.Visi_Misi.edit', compact('visiMisi'));
    }

    // ======================
    // STORE (TAMBAH VISI/MISI)
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|in:visi,misi',
            'description' => 'required'
        ]);

        // kalau VISI → update saja (1 data)
        if ($request->name === 'visi') {

            $visi = VisiMisi::visi()->first();

            if ($visi) {
                $visi->update([
                    'description' => $request->description
                ]);
            } else {
                VisiMisi::create([
                    'name' => 'visi',
                    'description' => $request->description
                ]);
            }

        } else {
            // MISI bisa banyak
            VisiMisi::create([
                'name' => 'misi',
                'description' => $request->description
            ]);
        }

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil disimpan');
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $data = VisiMisi::findOrFail($id);

        $request->validate([
            'description' => 'required'
        ]);

        $data->update([
            'description' => $request->description
        ]);

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil diupdate');
    }

    // ======================
    // DELETE (KHUSUS MISI)
    // ======================
    public function destroy($id)
    {
        $data = VisiMisi::findOrFail($id);

        // jangan hapus VISI
        if ($data->name === 'visi') {
            return back()->with('error', 'Visi tidak boleh dihapus');
        }

        $data->delete();

        return redirect()->route('admin.visi-misi.index')->with('success', 'Data berhasil dihapus');
    }
}