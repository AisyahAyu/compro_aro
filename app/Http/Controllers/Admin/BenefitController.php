<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefits::orderBy('order', 'asc')->get();
        return view('admin.benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.benefits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        // Upload icon
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('benefits', 'public');
        }

        Benefits::create($validated);

        return redirect()->route('admin.benefits.index')
            ->with('success', 'Benefit created successfully.');
    }

    public function edit(Benefits $benefit)
    {
        return view('admin.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, Benefits $benefit)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order'       => 'nullable|integer',
            'status'      => 'required|in:active,inactive',
        ]);

        // Upload icon baru
        if ($request->hasFile('icon')) {

            // hapus icon lama
            if ($benefit->icon && Storage::disk('public')->exists($benefit->icon)) {
                Storage::disk('public')->delete($benefit->icon);
            }

            $validated['icon'] = $request->file('icon')->store('benefits', 'public');
        }

        $benefit->update($validated);

        return redirect()->route('admin.benefits.index')
            ->with('success', 'Benefit updated successfully.');
    }

    public function destroy(Benefits $benefit)
    {
        // hapus icon kalau ada
        if ($benefit->icon && Storage::disk('public')->exists($benefit->icon)) {
            Storage::disk('public')->delete($benefit->icon);
        }

        $benefit->delete();

        return redirect()->route('admin.benefits.index')
            ->with('success', 'Benefit deleted successfully.');
    }
}