<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail; // TAMBAHKAN INI
use App\Mail\JobApplicationStatusMail; // TAMBAHKAN INI

class JobApplicationController extends Controller
{
    /**
     * Menampilkan daftar semua pelamar yang masuk
     */
    public function index()
    {
        $applications = JobApplication::with('job_vacancy')->latest()->get();
        return view('admin.job-applications.index', compact('applications'));
    }

    /**
     * Detail pelamar
     */
    public function show($id)
    {
        $application = JobApplication::with('job_vacancy')->findOrFail($id);
        return view('admin.job-applications.show', compact('application'));
    }

    /**
     * Update status dan kirim email
     */
 public function update(Request $request, $id)
{
    // Mengambil data lamaran beserta relasi vacancy agar email punya konteks posisi jabatan
    $application = JobApplication::with('job_vacancy')->findOrFail($id);
    
    $request->validate([
        'status' => 'required|in:pending,reviewed,accepted,rejected'
    ]);

    // Update status di database
    $application->update(['status' => $request->status]);

    try {
        // Hanya kirim email jika statusnya diterima atau ditolak
        if (in_array($request->status, ['accepted', 'rejected'])) {
            // Menggunakan path lengkap agar tidak ada error 'Undefined type'
            \Illuminate\Support\Facades\Mail::to($application->email)
                ->send(new \App\Mail\JobApplicationStatusMail($application));
                
            $statusMsg = 'Status lamaran diperbarui & Email notifikasi terkirim ke pelamar!';
        } else {
            $statusMsg = 'Status lamaran berhasil diperbarui!';
        }

        return redirect()->back()->with('success', $statusMsg);

    } catch (\Exception $e) {
        // Jika ada masalah di .env atau koneksi internet, errornya akan muncul di box hijau dashboard
        return redirect()->back()->with('success', 'Status diperbarui, TAPI EMAIL GAGAL: ' . $e->getMessage());
    }
}

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        
        if ($application->resume_path) {
            Storage::disk('public')->delete($application->resume_path);
        }

        $application->delete();

        return redirect()->route('admin.applications.index')
            ->with('success', 'Data lamaran berhasil dihapus.');
    }
}