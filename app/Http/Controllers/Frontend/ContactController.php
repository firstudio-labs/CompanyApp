<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        $about = \App\Models\About::first();
        return view('frontend.contact.index', compact('about'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'message' => 'required|string',
        ]);

        // Cek duplikasi dalam 5 menit terakhir
        $recentDuplicate = Contact::where('email', $validated['email'])
            ->where('subject', $validated['subject'])
            ->where('created_at', '>', now()->subMinutes(5))
            ->exists();

        if ($recentDuplicate) {
            return $this->handleResponse($request, true, 'Terima kasih telah menghubungi kami. Pesan Anda telah dikirim.');
        }

        try {
            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'status' => 'unread',
                'read_at' => null
            ]);
            return $this->handleResponse($request, true, 'Pesan Anda telah dikirim! Kami akan menghubungi Anda secepatnya.');
        } catch (\Exception $e) {
            Log::error('Contact submission error: ' . $e->getMessage());
            return $this->handleResponse($request, false, 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }

    protected function handleResponse(Request $request, $success, $message)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => $success,
                'message' => $message,
            ], $success ? 200 : 422);
        }

        return $success
            ? redirect()->route('contact')->with('success', $message)
            : back()->withInput()->with('error', $message);
    }
}
