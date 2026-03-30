<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutStatistic;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|integer',
            'suffix' => 'nullable|string|max:10',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 🔥 icon = gambar
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title'     => $request->title,
            'value'     => $request->value,
            'suffix'    => $request->suffix,
            'order'     => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ];

        // 🔥 upload gambar ke field icon
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        }

        AboutStatistic::create($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // ======================
    // EDIT
    // ======================
    public function edit($id)
    {
        $data = AboutStatistic::findOrFail($id);

        return view('admin.tentang.statistics.edit', compact('data'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $data = AboutStatistic::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'value' => 'required|numeric',
            'suffix' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data->update([
            'title' => $request->title,
            'value' => $request->value,
            'suffix' => $request->suffix,
            'icon' => $request->icon,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.statistics.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy($id)
    {
        $data = AboutStatistic::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}