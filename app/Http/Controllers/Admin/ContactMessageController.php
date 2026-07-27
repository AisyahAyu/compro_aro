<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Tampilkan daftar semua pesan masuk.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contact-messages.index', compact('messages'));
    }

    /**
     * Tampilkan detail pesan & tandai sebagai sudah dibaca.
     */
    public function show(ContactMessage $contact_message)
    {
        if (!$contact_message->is_read) {
            $contact_message->update(['is_read' => true]);
        }

        return view('admin.contact-messages.show', compact('contact_message'));
    }

    /**
     * Hapus pesan.
     */
    public function destroy(ContactMessage $contact_message)
    {
        $contact_message->delete();

        return redirect()
            ->route('admin.contact-messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }

    /**
     * Toggle status baca pesan.
     */
    public function toggleRead(ContactMessage $contact_message)
    {
        $contact_message->update(['is_read' => !$contact_message->is_read]);

        return redirect()
            ->back()
            ->with('success', 'Status pesan berhasil diperbarui.');
    }
}
