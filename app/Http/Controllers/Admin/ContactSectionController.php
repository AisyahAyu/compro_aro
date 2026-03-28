<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSection;
use Illuminate\Http\Request;

class ContactSectionController extends Controller
{
    public function index()
    {
        $data = ContactSection::first(); // hanya 1 data

        return view('admin.contact_section.index', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'phone' => 'nullable|max:50',
            'email' => 'nullable|email'
        ]);

        $data = ContactSection::first();

        if (!$data) {
            ContactSection::create($request->all());
        } else {
            $data->update($request->all());
        }

        return back()->with('success', 'Berhasil disimpan');
    }
}