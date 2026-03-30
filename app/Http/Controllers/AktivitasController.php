<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Banner;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function index(Request $request)
    {
        $banner = Banner::where('is_active', 1)
            ->orderBy('order')
            ->first();

        $utama = Aktivitas::latest()->first();

        $sidebarQuery = Aktivitas::latest();

        // SEARCH
        if ($request->filled('q')) {
            $search = $request->q;

            $sidebarQuery->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('Deskripsi', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });

            $sidebarPosts = $sidebarQuery->get();
        } else {
            $sidebarPosts = $sidebarQuery->take(4)->get();
        }

        // AJAX
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.sidebar-items', compact('sidebarPosts'))->render()
            ]);
        }

        $galeri = Aktivitas::whereNotNull('gambar')
            ->latest()
            ->take(6)
            ->get();

        return view('aktivitas', compact(
            'banner',
            'utama',
            'sidebarPosts',
            'galeri'
        ));
    }

    public function show($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);

        $aktivitasLainnya = Aktivitas::where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        return view('detail-aktivitas', compact('aktivitas', 'aktivitasLainnya'));
    }
}