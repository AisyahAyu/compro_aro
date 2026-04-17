<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Str;

class JobApplicationController extends Controller
{
    /**
     * Menyimpan lamaran baru dari pelamar (Frontend)
     */
    public function store(Request $request)
    {
        // 1. VALIDASI
        $validated = $request->validate([
            'job_vacancy_id'      => 'required|exists:job_vacancies,id',
            'full_name'           => 'required|string|max:255',
            'email'               => 'required|email',
            'phone_number'        => 'required|regex:/^[0-9+\-() ]+$/',
            'last_education'      => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'resume'              => 'required|file|mimes:pdf|max:2048',
            'previous_job'        => 'nullable|string|max:255',
            'linkedin_url'        => 'nullable|url',
            'cover_letter'        => 'nullable|string',
        ]);

        // 2. CEK DUPLIKAT
        $alreadyApplied = JobApplication::where('email', $request->email)
            ->where('job_vacancy_id', $request->job_vacancy_id)
            ->exists();

        if ($alreadyApplied) {
            // Cek apakah request dari AJAX
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kamu sudah pernah melamar ke lowongan ini.'
                ], 422);
            }
            return back()->withInput()->with('error', 'Kamu sudah pernah melamar ke lowongan ini.');
        }

        // 3. UPLOAD FILE
        $resumePath = null;

        if ($request->hasFile('resume')) {
            $file      = $request->file('resume');
            $cleanName = Str::slug($request->full_name);
            $extension = $file->getClientOriginalExtension();
            $filename  = time() . '_' . $cleanName . '_CV.' . $extension;

            try {
                $file->storeAs('resumes', $filename, 'public');
                $resumePath = 'resumes/' . $filename;
            } catch (\Exception $e) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Upload CV gagal. Coba lagi.'
                    ], 500);
                }
                return back()->withInput()->with('error', 'Upload CV gagal, coba lagi.');
            }
        }

        // 4. SIMPAN DB
        try {
            JobApplication::create([
                'job_vacancy_id'      => $request->job_vacancy_id,
                'full_name'           => $request->full_name,
                'email'               => $request->email,
                'phone_number'        => $request->phone_number,
                'last_education'      => $request->last_education,
                'years_of_experience' => $request->years_of_experience,
                'previous_job'        => $request->previous_job,
                'linkedin_url'        => $request->linkedin_url,
                'cover_letter'        => $request->cover_letter,
                'resume_path'         => $resumePath,
                'status'              => 'pending',
            ]);
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menyimpan lamaran. Coba lagi.'
                ], 500);
            }
            return back()->withInput()->with('error', 'Gagal menyimpan lamaran.');
        }

        // 5. RESPONSE — AJAX vs Normal
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Lamaran berhasil dikirim!'
            ]);
        }

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }
}