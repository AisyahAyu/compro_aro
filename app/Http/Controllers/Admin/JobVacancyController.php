<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use App\Models\JobCategory;

class JobVacancyController extends Controller
{
    /**
     * Menampilkan daftar semua lowongan.
     */
    public function index()
    {
        // Menggunakan with('category') agar tidak terjadi N+1 query problem
        $jobVacancies = JobVacancy::with('category')->latest()->get();
        return view('admin.job_vacancies.index', compact('jobVacancies'));
    }

    /**
     * Form untuk tambah lowongan baru.
     */
    public function create()
    {
        $categories = JobCategory::all();
        return view('admin.job_vacancies.create', compact('categories'));
    }

    /**
     * Simpan data lowongan ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:full_time,part_time,internship,freelance',
            'experience' => 'nullable|string|max:255',
            'min_salary' => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'description' => 'required|string',
            'responsibility' => 'required|string',
            'qualification' => 'required|string',
            'location' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'status' => 'required|in:active,inactive'
        ]);

        JobVacancy::create($request->all());

        return redirect()->route('admin.job_vacancies.index')
                         ->with('success', 'Lowongan berhasil dibuat.');
    }

    /**
     * Menampilkan detail lowongan (untuk admin cek isi deskripsi dll).
     */
    public function show($id)
    {
        $jobVacancy = JobVacancy::with('category')->findOrFail($id);
        return view('admin.job_vacancies.show', compact('jobVacancy'));
    }

    /**
     * Form untuk edit data lowongan.
     */
    public function edit($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $categories = JobCategory::all();
        return view('admin.job_vacancies.edit', compact('jobVacancy', 'categories'));
    }

    /**
     * Update data lowongan.
     */
    public function update(Request $request, $id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:full_time,part_time,internship,freelance',
            'min_salary' => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'description' => 'required|string',
            'responsibility' => 'required|string',
            'qualification' => 'required|string',
            'job_category_id' => 'required|exists:job_categories,id',
            'status' => 'required|in:active,inactive'
        ]);

        $jobVacancy->update($request->all());

        return redirect()->route('admin.job_vacancies.index')
                         ->with('success', 'Lowongan berhasil diperbarui.');
    }

    /**
     * Hapus lowongan.
     */
    public function destroy($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $jobVacancy->delete();

        return redirect()->route('admin.job_vacancies.index')
                         ->with('success', 'Lowongan berhasil dihapus.');
    }
}