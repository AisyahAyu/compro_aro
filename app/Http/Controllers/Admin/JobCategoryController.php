<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $categories = JobCategory::all();
        return view('admin.job_categories.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */

    
    public function create()
    {
        return view('admin.job_categories.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:job_categories,name',
        ]);

        JobCategory::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.job_categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu kategori (Biasanya jarang dipakai, tapi buat jaga-jaga).
     */
    public function show($id)
    {
        $category = JobCategory::with('jobVacancies')->findOrFail($id);
        return view('admin.job_categories.show', compact('category'));
    }

    /**
     * Menampilkan form edit kategori.
     */
    public function edit($id)
    {
        $category = JobCategory::findOrFail($id);
        return view('admin.job_categories.edit', compact('category'));
    }

    /**
     * Memperbarui kategori di database.
     */
    public function update(Request $request, $id)
    {
        $category = JobCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:job_categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.job_categories.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori.
     */
    public function destroy($id)
    {
        $category = JobCategory::findOrFail($id);
        
        // Cek dulu apakah kategori ini sedang dipakai oleh lowongan kerja
        if ($category->jobVacancies()->count() > 0) {
            return redirect()->back()->with('error', 'Gagal hapus! Kategori ini masih digunakan oleh beberapa lowongan.');
        }

        $category->delete();

        return redirect()->route('admin.job_categories.index')
                         ->with('success', 'Kategori berhasil dihapus.');
    }

    
}