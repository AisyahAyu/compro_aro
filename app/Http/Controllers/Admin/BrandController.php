<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index()
    {
        $data = Brand::orderBy('order')->get();
        return view('admin.brands.index', compact('data'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        return view('admin.brands.create');
    }

    // ======================
    // STORE
    // ======================
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
            
            $image->move(public_path('uploads/brands'), $filename);
            $data['logo'] = 'uploads/brands/' . $filename;
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    // ======================
    // EDIT
    // ======================
    public function edit(string $id)
    {
        $data = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('data'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $brand = Brand::findOrFail($id);
        $data = $request->except('logo');

        $data['order'] = $request->order ?? 0;
        $data['is_active'] = $request->is_active ?? 0;

        if ($request->hasFile('logo')) {

            // hapus lama
            if ($brand->logo && file_exists(public_path($brand->logo))) {
                unlink(public_path($brand->logo));
            }

            // upload baru
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('uploads/brands'), $filename);
            $data['logo'] = 'uploads/brands/' . $filename;
        }

        $brand->update($data);

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}