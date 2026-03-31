<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutStatistic;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = AboutStatistic::latest()->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title'     => $request->title,
            'suffix'    => $request->suffix,
            'is_active' => $request->is_active == 1,
        ];

        // 🔥 upload gambar ke kolom icon
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        }

        AboutStatistic::create($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Data statistik berhasil ditambahkan');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $statistic = AboutStatistic::findOrFail($id);
        return view('admin.statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $statistic = AboutStatistic::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title'     => $request->title,
            'suffix'    => $request->suffix,
            'is_active' => $request->is_active == 1,
        ];

        // 🔥 upload gambar baru jika ada
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($statistic->icon && file_exists(storage_path('app/public/' . $statistic->icon))) {
                unlink(storage_path('app/public/' . $statistic->icon));
            }
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        }

        $statistic->update($data);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Data statistik berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statistic = AboutStatistic::findOrFail($id);
        $statistic->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Data statistik berhasil dihapus');
    }
}