<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use Illuminate\Http\Request;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workProcesses = WorkProcess::orderBy('step_number')->get();
        return view('admin.work-processes.index', compact('workProcesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work-processes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        WorkProcess::create($data);
        return redirect()->route('admin.work-processes.index')->with('success', 'Work process created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workProcess = WorkProcess::findOrFail($id);
        return view('admin.work-processes.show', compact('workProcess'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workProcess = WorkProcess::findOrFail($id);
        return view('admin.work-processes.edit', compact('workProcess'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'step_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $workProcess = WorkProcess::findOrFail($id);
        $workProcess->update($request->all());
        return redirect()->route('admin.work-processes.index')->with('success', 'Work process updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workProcess = WorkProcess::findOrFail($id);
        $workProcess->delete();
        return redirect()->route('admin.work-processes.index')->with('success', 'Work process deleted successfully.');
    }
}
