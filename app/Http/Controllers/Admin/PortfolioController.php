<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function adminIndex()
    {
        $portfolios = Portfolio::with(['service', 'techStacks'])->latest()->paginate(10);
        $techStacks = TechStack::all();
        return view('admin.portfolio.index', compact('portfolios', 'techStacks'));
    }

    public function create()
    {
        $services = Service::all();
        $techStacks = TechStack::all();
        return view('admin.portfolio.create', compact('services', 'techStacks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        // Generate unique slug
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Portfolio::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/portfolios'), $imageName);
            $validated['image_url'] = $imageName;
        }

        // Store
        $portfolio = Portfolio::create($validated);
        // $request->tech_stack_ids adalah array of id
        $portfolio->techStacks()->sync($request->tech_stack_ids);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function show($id)
    {
        $portfolio = Portfolio::with(['service', 'techStacks'])->findOrFail($id);
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = Portfolio::with('techStacks')->findOrFail($id);
        $services = Service::all();
        $techStacks = TechStack::all();
        return view('admin.portfolio.edit', compact('portfolio', 'services', 'techStacks'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        // Update slug jika title berubah
        if ($portfolio->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            while (Portfolio::where('slug', $slug)->where('id', '!=', $portfolio->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = $portfolio->slug;
        }

        // Handle image upload
        if ($request->hasFile('image_url')) {
            if ($portfolio->image_url && file_exists(public_path('images/portfolios/' . $portfolio->image_url))) {
                unlink(public_path('images/portfolios/' . $portfolio->image_url));
            }
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/portfolios'), $imageName);
            $validated['image_url'] = $imageName;
        }

        // Update
        $portfolio->update($validated);
        $portfolio->techStacks()->sync($request->tech_stack_ids);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if ($portfolio->image_url && file_exists(public_path('images/portfolios/' . $portfolio->image_url))) {
            unlink(public_path('images/portfolios/' . $portfolio->image_url));
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio berhasil dihapus.');
    }

    public function index()
    {
        return $this->adminIndex();
    }
}
