<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->except('logo');

        // DEFAULT VALUE
        $data['order'] = $request->order ?? 0;
        $data['is_active'] = $request->is_active ?? 0;

        // UPLOAD GAMBAR TANPA RESIZE
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('uploads/partners'), $filename);
            $data['logo'] = 'uploads/partners/' . $filename;
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $partner = Partner::findOrFail($id);
        $data = $request->except('logo');

        $data['order'] = $request->order ?? 0;
        $data['is_active'] = $request->is_active ?? 0;

        if ($request->hasFile('logo')) {

            // hapus lama
            if ($partner->logo && file_exists(public_path($partner->logo))) {
                unlink(public_path($partner->logo));
            }

            // upload baru
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('uploads/partners'), $filename);
            $data['logo'] = 'uploads/partners/' . $filename;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->logo && file_exists(public_path($partner->logo))) {
            unlink(public_path($partner->logo));
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }
}