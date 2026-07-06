<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legality;
use Illuminate\Http\Request;

class LegalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalities = Legality::orderBy('order')->get();
        return view('admin.legalities.index', compact('legalities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.legalities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        Legality::create($data);
        return redirect()->route('admin.legalities.index')->with('success', 'Legality created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $legality = Legality::findOrFail($id);
        return view('admin.legalities.show', compact('legality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $legality = Legality::findOrFail($id);
        return view('admin.legalities.edit', compact('legality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'integer',
            'is_active' => 'nullable|boolean'
        ]);

        $legality = Legality::findOrFail($id);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $legality->update($data);
        return redirect()->route('admin.legalities.index')->with('success', 'Legality updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legality = Legality::findOrFail($id);
        $legality->delete();
        return redirect()->route('admin.legalities.index')->with('success', 'Legality deleted successfully.');
    }
}
