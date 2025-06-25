<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechStackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techStacks = \App\Models\TechStack::with('category')->get();
        return view('admin.techstack.index', compact('techStacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.techstack.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|file|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('icon');
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('uploads/techstack', 'public');
        }

        TechStack::create($data);

        return redirect()->route('admin.techstack.index')->with('success', 'Tech Stack created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TechStack $techstack)
    {
        return view('admin.techstack.show', compact('techstack'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TechStack $techstack)
    {
        return view('admin.techstack.edit', compact('techstack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TechStack $techstack)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|file|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $data = $request->except('icon');
        if ($request->hasFile('icon')) {
            // Hapus icon lama jika ada
            if ($techstack->icon && Storage::disk('public')->exists($techstack->icon)) {
                Storage::disk('public')->delete($techstack->icon);
            }
            $data['icon'] = $request->file('icon')->store('uploads/techstack', 'public');
        }

        $techstack->update($data);

        return redirect()->route('admin.techstack.index')->with('success', 'Tech Stack updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TechStack $techstack)
    {
        if ($techstack->icon && Storage::disk('public')->exists($techstack->icon)) {
            Storage::disk('public')->delete($techstack->icon);
        }
        $techstack->delete();
        return redirect()->route('admin.techstack.index')->with('success', 'Tech Stack deleted successfully.');
    }
}
