<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image_banner')) {
            $image = $request->file('image_banner')->store('images/services', 'public');
            $data['image_banner'] = 'storage/' . $image;
        }

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url')->store('images/services', 'public');
            $data['image_url'] = 'storage/' . $image;
        }

        Service::create($data);

        return redirect()->route('admin.service.index')->with('success', 'Service berhasil ditambahkan.');
    }

    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['title', 'description']);
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image_banner')) {
            if ($service->image_banner && file_exists(public_path($service->image_banner))) {
                unlink(public_path($service->image_banner));
            }
            $image = $request->file('image_banner')->store('images/services', 'public');
            $data['image_banner'] = 'storage/' . $image;
        }

        if ($request->hasFile('image_url')) {
            if ($service->image_url && file_exists(public_path($service->image_url))) {
                unlink(public_path($service->image_url));
            }
            $image = $request->file('image_url')->store('images/services', 'public');
            $data['image_url'] = 'storage/' . $image;
        }

        $service->update($data);

        return redirect()->route('admin.service.index')->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->image_banner && file_exists(public_path($service->image_banner))) {
            unlink(public_path($service->image_banner));
        }
        if ($service->image_url && file_exists(public_path($service->image_url))) {
            unlink(public_path($service->image_url));
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service berhasil dihapus.');
    }
}
