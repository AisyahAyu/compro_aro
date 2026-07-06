<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $platforms = Platform::orderBy('title')->get();
        return view('admin.platforms.index', compact('platforms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'platform_url' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'is_active' => 'nullable'
        ]);

        $data = $request->except(['image', 'is_active']);

        // Handle is_active checkbox
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Clean and normalize URL manually
        $url = $request->platform_url;
        if (is_array($url)) {
            $url = '';
        } elseif ($url && !str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'https://' . $url;
        }
        $data['platform_url'] = $url;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/platforms'), $imageName);
            $data['image'] = 'uploads/platforms/' . $imageName;
        }

        Platform::create($data);
        return redirect()->route('admin.platforms.index')->with('success', 'Platform created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $platform = Platform::findOrFail($id);
        return view('admin.platforms.show', compact('platform'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $platform = Platform::findOrFail($id);
        return view('admin.platforms.edit', compact('platform'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'platform_url' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'is_active' => 'nullable'
        ]);

        $platform = Platform::findOrFail($id);
        $data = $request->except(['image', 'is_active']);

        // Handle is_active checkbox
        $data['is_active'] = $request->has('is_active') ? true : false;

        // Clean and normalize URL manually
        $url = $request->platform_url;
        if (is_array($url)) {
            $url = '';
        } elseif ($url && !str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'https://' . $url;
        }
        $data['platform_url'] = $url;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($platform->image && file_exists(public_path($platform->image))) {
                unlink(public_path($platform->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/platforms'), $imageName);
            $data['image'] = 'uploads/platforms/' . $imageName;
        }

        $platform->update($data);
        return redirect()->route('admin.platforms.index')->with('success', 'Platform updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $platform = Platform::findOrFail($id);
        
        // Delete image
        if ($platform->image && file_exists(public_path($platform->image))) {
            unlink(public_path($platform->image));
        }
        
        $platform->delete();
        return redirect()->route('admin.platforms.index')->with('success', 'Platform deleted successfully.');
    }
}
