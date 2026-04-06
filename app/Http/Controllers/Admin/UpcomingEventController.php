<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpcomingEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpcomingEventController extends Controller
{
    public function index()
    {
        $events = UpcomingEvent::latest()->paginate(10);
        // Memanggil view di folder: admin/upcoming_event/index.blade.php
        return view('admin.upcoming_event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.upcoming_event.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'description'  => 'required', 
        'event_date'   => 'required|date',
        'start_time'   => 'nullable',
        'location'     => 'nullable|string',
        'image'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'category'     => 'required|in:upcoming,past',
        'is_published' => 'required|boolean',
    ]);

    // Tambahkan slug secara manual ke array validated
    $validated['slug'] = Str::slug($request->title);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('events', 'public');
    }

    // Gunakan $validated, bukan $request->all()
    UpcomingEvent::create($validated);

    return redirect()->route('admin.upcoming_event.index')->with('success', 'Event successfully added!');
}

    public function edit(UpcomingEvent $upcomingEvent)
    {
        return view('admin.upcoming_event.edit', compact('upcomingEvent'));
    }

    public function update(Request $request, UpcomingEvent $upcomingEvent)
    {
        $request->validate([
            'title'      => 'required|max:255',
            'event_date' => 'required|date',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($upcomingEvent->image) {
                Storage::disk('public')->delete($upcomingEvent->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $upcomingEvent->update($data);

        return redirect()->route('admin.upcoming_event.index')->with('success', 'Event berhasil diperbarui!');
    }
public function show($id)
    {
        // Mencari data event berdasarkan ID
        $upcomingEvent = UpcomingEvent::findOrFail($id);

        // Mengirim data ke view detail yang sudah kita buat tadi
        return view('admin.upcoming_event.show', compact('upcomingEvent'));
    }
    
    public function destroy(UpcomingEvent $upcomingEvent)
    {
        if ($upcomingEvent->image) {
            Storage::disk('public')->delete($upcomingEvent->image);
        }
        
        $upcomingEvent->delete();

        return redirect()->route('admin.upcoming_event.index')->with('success', 'Event berhasil dihapus!');
    }
}