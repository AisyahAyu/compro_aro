<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('order')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
            'page_type' => 'required|string|in:home,about'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banners'), $imageName);
            $data['image'] = 'uploads/banners/' . $imageName;
        }

        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'integer',
            'is_active' => 'boolean',
            'page_type' => 'required|string|in:home,about'
        ]);

        $banner = Banner::findOrFail($id);
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/banners'), $imageName);
            $data['image'] = 'uploads/banners/' . $imageName;
        }

        $banner->update($data);
        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        
        // Delete image
        if ($banner->image && file_exists(public_path($banner->image))) {
            unlink(public_path($banner->image));
        }
        
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
