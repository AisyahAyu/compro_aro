<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = CompanyProfile::first();
        return view('admin.company-profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company-profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'operational_hours' => 'nullable|string',
        ]);

        $data = $request->except(['image', 'logo', 'logo_dark', 'social_media']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads'), $logoName);
            $data['logo'] = 'uploads/' . $logoName;
        }
        
        // Handle logo_dark upload
        if ($request->hasFile('logo_dark')) {
            $logoDark = $request->file('logo_dark');
            $logoDarkName = time() . '_logo_dark.' . $logoDark->getClientOriginalExtension();
            $logoDark->move(public_path('uploads'), $logoDarkName);
            $data['logo_dark'] = 'uploads/' . $logoDarkName;
        }

        // Handle social media
        $socialMedia = [];
        if ($request->facebook) $socialMedia['facebook'] = $request->facebook;
        if ($request->twitter) $socialMedia['twitter'] = $request->twitter;
        if ($request->instagram) $socialMedia['instagram'] = $request->instagram;
        if ($request->linkedin) $socialMedia['linkedin'] = $request->linkedin;
        $data['social_media'] = $socialMedia;

        CompanyProfile::create($data);
        return redirect()->route('admin.company-profiles.index')->with('success', 'Company profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = CompanyProfile::findOrFail($id);
        return view('admin.company-profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = CompanyProfile::findOrFail($id);
        return view('admin.company-profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'operational_hours' => 'nullable|string',
        ]);

        $profile = CompanyProfile::findOrFail($id);
        $data = $request->except(['image', 'logo', 'logo_dark', 'social_media']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($profile->image && file_exists(public_path($profile->image))) {
                unlink(public_path($profile->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($profile->logo && file_exists(public_path($profile->logo))) {
                unlink(public_path($profile->logo));
            }
            
            $logo = $request->file('logo');
            $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads'), $logoName);
            $data['logo'] = 'uploads/' . $logoName;
        }
        
        // Handle logo_dark upload
        if ($request->hasFile('logo_dark')) {
            // Delete old logo_dark
            if ($profile->logo_dark && file_exists(public_path($profile->logo_dark))) {
                unlink(public_path($profile->logo_dark));
            }
            
            $logoDark = $request->file('logo_dark');
            $logoDarkName = time() . '_logo_dark.' . $logoDark->getClientOriginalExtension();
            $logoDark->move(public_path('uploads'), $logoDarkName);
            $data['logo_dark'] = 'uploads/' . $logoDarkName;
        }

        // Handle social media
        $socialMedia = [];
        if ($request->facebook) $socialMedia['facebook'] = $request->facebook;
        if ($request->twitter) $socialMedia['twitter'] = $request->twitter;
        if ($request->instagram) $socialMedia['instagram'] = $request->instagram;
        if ($request->linkedin) $socialMedia['linkedin'] = $request->linkedin;
        $data['social_media'] = $socialMedia;

        $profile->update($data);
        return redirect()->route('admin.company-profiles.index')->with('success', 'Company profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = CompanyProfile::findOrFail($id);
        
        // Delete image and logo
        if ($profile->image && file_exists(public_path($profile->image))) {
            unlink(public_path($profile->image));
        }
        if ($profile->logo && file_exists(public_path($profile->logo))) {
            unlink(public_path($profile->logo));
        }
        if ($profile->logo_dark && file_exists(public_path($profile->logo_dark))) {
            unlink(public_path($profile->logo_dark));
        }
        
        $profile->delete();
        return redirect()->route('admin.company-profiles.index')->with('success', 'Company profile deleted successfully.');
    }
}
