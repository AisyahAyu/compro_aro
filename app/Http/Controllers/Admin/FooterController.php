<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    /**
     * Tampilkan halaman Footer Appearance Settings.
     */
    public function index()
    {
        $settings = FooterSetting::getSettings();
        $defaults = FooterSetting::getDefaults();

        return view('admin.footer.settings', compact('settings', 'defaults'));
    }

    /**
     * Simpan / update footer settings.
     */
    public function update(Request $request)
    {
        $colorRule = function ($attribute, $value, $fail) {
            if (is_null($value) || $value === 'transparent') {
                return;
            }
            if (preg_match('/^#[a-fA-F0-9]{3,8}$/', $value)) {
                return;
            }
            if (preg_match('/^rgba?\(\s*\d+\s*,\s*\d+\s*,\s*\d+\s*(?:,\s*[\d\.]+\s*)?\)$/', $value)) {
                return;
            }
            $fail("Kolom {$attribute} harus berupa warna HEX atau RGB/RGBA yang valid.");
        };

        $request->validate([
            'footer_bg_color'           => ['required', 'string', 'max:50', $colorRule],
            'footer_text_color'         => ['required', 'string', 'max:50', $colorRule],
            'footer_heading_color'      => ['required', 'string', 'max:50', $colorRule],
            'footer_link_color'         => ['required', 'string', 'max:50', $colorRule],
            'footer_link_hover_color'   => ['required', 'string', 'max:50', $colorRule],
            'footer_border_color'       => ['required', 'string', 'max:50', $colorRule],
            'contact_icon_color'        => ['required', 'string', 'max:50', $colorRule],
            'social_icon_color'         => ['required', 'string', 'max:50', $colorRule],
            'social_icon_hover_color'   => ['required', 'string', 'max:50', $colorRule],
            'location_btn_bg_color'     => ['nullable', 'string', 'max:50', $colorRule],
            'location_btn_text_color'   => ['required', 'string', 'max:50', $colorRule],
            'location_btn_border_color' => ['required', 'string', 'max:50', $colorRule],
            'footer_copyright'          => 'nullable|string|max:255',
            'footer_logo'               => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'footer_google_maps_iframe' => 'nullable|string',
            'footer_google_maps_link'   => 'nullable|string|url',
        ]);

        $settings = FooterSetting::first();
        if (!$settings) {
            $settings = new FooterSetting();
        }

        $data = $request->except(['footer_logo', '_token', '_method', 'remove_logo']);

        // Handle logo upload
        if ($request->hasFile('footer_logo')) {
            // Hapus logo lama jika ada
            if ($settings->footer_logo && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }
            $path = $request->file('footer_logo')->store('footer', 'public');
            $data['footer_logo'] = $path;
        }

        // Handle hapus logo
        if ($request->has('remove_logo') && $request->remove_logo == '1') {
            if ($settings->footer_logo && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }
            $data['footer_logo'] = null;
        }

        $settings->fill($data);
        $settings->save();

        return redirect()
            ->route('admin.footer-settings.index')
            ->with('success', 'Pengaturan tampilan footer berhasil disimpan!');
    }

    public function reset()
    {
        $settings = FooterSetting::first();
        $defaults = FooterSetting::getDefaults();

        if ($settings) {
            // Hapus file logo kustom jika ada
            if ($settings->footer_logo && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }
            
            $settings->fill($defaults);
            $settings->save();
        } else {
            FooterSetting::create($defaults);
        }

        return redirect()
            ->route('admin.footer-settings.index')
            ->with('success', 'Pengaturan footer berhasil direset ke default!');
    }

    /**
     * API endpoint: ambil footer settings sebagai JSON (untuk frontend).
     */
    public function getSettings()
    {
        $settings = FooterSetting::getSettings();
        return response()->json($settings);
    }

    /**
     * API endpoint: update footer settings sebagai JSON (untuk admin/frontend).
     */
    public function apiUpdate(Request $request)
    {
        $colorRule = function ($attribute, $value, $fail) {
            if (is_null($value) || $value === 'transparent') {
                return;
            }
            if (preg_match('/^#[a-fA-F0-9]{3,8}$/', $value)) {
                return;
            }
            if (preg_match('/^rgba?\(\s*\d+\s*,\s*\d+\s*,\s*\d+\s*(?:,\s*[\d\.]+\s*)?\)$/', $value)) {
                return;
            }
            $fail("Kolom {$attribute} harus berupa warna HEX atau RGB/RGBA yang valid.");
        };

        $request->validate([
            'footer_bg_color'           => ['required', 'string', 'max:50', $colorRule],
            'footer_text_color'         => ['required', 'string', 'max:50', $colorRule],
            'footer_heading_color'      => ['required', 'string', 'max:50', $colorRule],
            'footer_link_color'         => ['required', 'string', 'max:50', $colorRule],
            'footer_link_hover_color'   => ['required', 'string', 'max:50', $colorRule],
            'footer_border_color'       => ['required', 'string', 'max:50', $colorRule],
            'contact_icon_color'        => ['required', 'string', 'max:50', $colorRule],
            'social_icon_color'         => ['required', 'string', 'max:50', $colorRule],
            'social_icon_hover_color'   => ['required', 'string', 'max:50', $colorRule],
            'location_btn_bg_color'     => ['nullable', 'string', 'max:50', $colorRule],
            'location_btn_text_color'   => ['required', 'string', 'max:50', $colorRule],
            'location_btn_border_color' => ['required', 'string', 'max:50', $colorRule],
            'footer_copyright'          => 'nullable|string|max:255',
            'footer_logo'               => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'footer_google_maps_iframe' => 'nullable|string',
            'footer_google_maps_link'   => 'nullable|string|url',
        ]);

        $settings = FooterSetting::first();
        if (!$settings) {
            $settings = new FooterSetting();
        }

        $data = $request->except(['footer_logo', 'remove_logo']);

        // Handle logo upload
        if ($request->hasFile('footer_logo')) {
            if ($settings->footer_logo && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }
            $path = $request->file('footer_logo')->store('footer', 'public');
            $data['footer_logo'] = $path;
        }

        // Handle hapus logo
        if ($request->has('remove_logo') && $request->remove_logo == '1') {
            if ($settings->footer_logo && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }
            $data['footer_logo'] = null;
        }

        $settings->fill($data);
        $settings->save();

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan tampilan footer berhasil disimpan!',
            'data' => $settings
        ]);
    }
}
