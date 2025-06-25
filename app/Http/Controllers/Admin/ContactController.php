<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // List pesan kontak
    public function index(Request $request)
    {
        $contacts = Contact::status($request->status)
            ->search($request->search)
            ->orderBy(
                match ($request->get('sort', 'newest')) {
                    'oldest' => 'created_at',
                    'name_asc' => 'name',
                    'name_desc' => 'name',
                    default => 'created_at'
                },
                match ($request->get('sort', 'newest')) {
                    'oldest' => 'asc',
                    'name_asc' => 'asc',
                    'name_desc' => 'desc',
                    default => 'desc'
                }
            )
            ->paginate(10)
            ->appends($request->query());

        $statusCounts = [
            'unread' => Contact::where('status', 'unread')->count(),
            'read' => Contact::where('status', 'read')->count(),
            'replied' => Contact::where('status', 'replied')->count(),
            'total' => Contact::count()
        ];

        return view('admin.contact.index', compact('contacts', 'statusCounts'));
    }

    // Detail pesan kontak
    public function show(Contact $contact)
    {
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read', 'read_at' => now()]);
        }
        return view('admin.contact.show', compact('contact'));
    }

    // Hapus pesan kontak
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Pesan kontak berhasil dihapus.');
    }

    // Bulk delete
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:contacts,id',
        ]);
        $count = Contact::whereIn('id', $request->ids)->delete();

        return response()->json([
            'success' => true,
            'message' => "Berhasil menghapus $count pesan kontak terpilih.",
            'count' => $count
        ]);
    }

    // Mark as replied (opsional)
    public function markAsReplied(Request $request, Contact $contact)
    {
        $request->validate([
            'admin_notes' => 'required|string'
        ]);
        $contact->update([
            'status' => 'replied',
            'admin_notes' => $request->admin_notes
        ]);
        return redirect()->route('admin.contact.show', $contact->id)
            ->with('success', 'Pesan telah ditandai sebagai sudah dibalas.');
    }
}