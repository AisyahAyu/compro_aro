<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    /**
     * Menyimpan lamaran baru dari pelamar (Frontend)
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'job_vacancy_id'      => 'required|exists:job_vacancies,id',
            'full_name'           => 'required|string|max:255',
            'email'               => 'required|email:dns', 
            'phone_number'        => 'required|string',
            'last_education'      => 'required',
            'years_of_experience' => 'required|integer',
            'resume'              => 'required|mimes:pdf|max:2048', // Max 2MB
        ]);

        // Inisialisasi variabel path untuk database
        $resumePath = null;

        // 2. Proses Simpan File CV
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            
            // Bersihkan nama file dari spasi agar URL tidak rusak
            $cleanName = str_replace(' ', '_', $request->full_name);
            $filename = time() . '_' . $cleanName . '_CV.pdf';
            
            // Simpan ke: storage/app/public/resumes/filename.pdf
            // Parameter 'public' di akhir adalah DISK-nya
            $file->storeAs('resumes', $filename, 'public');
            
            // Path yang akan disimpan di database
            $resumePath = 'resumes/' . $filename;
        }

        // 3. Simpan data ke database
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
            'resume_path'         => $resumePath, // Menggunakan variabel yang sudah berisi folder
            'status'              => 'pending',
        ]);

        return back()->with('success', 'Lamaran Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}