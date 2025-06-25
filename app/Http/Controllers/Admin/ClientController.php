<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('service')->latest()->get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.client.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'service_id'   => 'nullable|exists:services,id',
        ]);

        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/clients'), $imageName);
            $validated['company_logo'] = $imageName;
        }

        Client::create($validated);

        return redirect()->route('admin.client.index')->with('success', 'Client berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $services = Service::all();
        return view('admin.client.edit', compact('client', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'service_id'   => 'nullable|exists:services,id',
        ]);

        if ($request->hasFile('company_logo')) {
            // Hapus logo lama jika ada
            if ($client->company_logo && file_exists(public_path('images/clients/' . $client->company_logo))) {
                unlink(public_path('images/clients/' . $client->company_logo));
            }
            $image = $request->file('company_logo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/clients'), $imageName);
            $validated['company_logo'] = $imageName;
        } else {
            unset($validated['company_logo']);
        }

        $client->update($validated);

        return redirect()->route('admin.client.index')->with('success', 'Client berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.client.index')->with('success', 'Client berhasil dihapus.');
    }
}
