<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    // ======================
    // INDEX
    // ======================
    public function index()
    {
        $data = TeamMember::orderBy('order')->get();

        return view('admin.team_members.index', compact('data'));
    }

    // ======================
    // CREATE
    // ======================
    public function create()
    {
        return view('admin.team_members.create');
    }

    // ======================
    // STORE
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'order' => 'nullable|integer'
        ]);

        $data = $request->only([
            'name',
            'position',
            'order'
        ]);

        $data['is_active'] = $request->has('is_active');

        // upload foto
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    // ======================
    // EDIT
    // ======================
    public function edit($id)
    {
        $data = TeamMember::findOrFail($id);

        return view('admin.team_members.edit', compact('data'));
    }

    // ======================
    // UPDATE
    // ======================
    public function update(Request $request, $id)
    {
        $data = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'order' => 'nullable|integer'
        ]);

        $updateData = $request->only([
            'name',
            'position',
            'order'
        ]);

        $updateData['is_active'] = $request->has('is_active');

        // kalau upload foto baru
        if ($request->hasFile('photo')) {

            // hapus foto lama
            if ($data->photo && Storage::disk('public')->exists($data->photo)) {
                Storage::disk('public')->delete($data->photo);
            }

            // upload baru
            $updateData['photo'] = $request->file('photo')->store('team', 'public');
        }

        $data->update($updateData);

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    // ======================
    // DELETE
    // ======================
    public function destroy($id)
    {
        $data = TeamMember::findOrFail($id);

        // hapus foto
        if ($data->photo && Storage::disk('public')->exists($data->photo)) {
            Storage::disk('public')->delete($data->photo);
        }

        $data->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}