<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use App\Models\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // ADMIN: List produk
    public function adminIndex()
    {
        $products = Product::with(['service', 'techStacks'])->latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    // ADMIN: Form tambah produk
    public function create()
    {
        $services = Service::all();
        $techStacks = TechStack::all();
        return view('admin.product.create', compact('services', 'techStacks'));
    }

    // ADMIN: Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'tech_stack_ids' => 'nullable|array',
            'tech_stack_ids.*' => 'exists:tech_stacks,id',
        ]);

        // Generate slug unik
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Upload gambar jika ada
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image_url'] = $imageName;
        }

        $product = Product::create($validated);
        $product->techStacks()->sync($request->tech_stack_ids ?? []);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // ADMIN: Detail produk by id
    public function show($id)
    {
        $product = Product::with(['service', 'techStacks'])->findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    // ADMIN: Form edit produk
    public function edit($id)
    {
        $product = Product::with('techStacks')->findOrFail($id);
        $services = Service::all();
        $techStacks = TechStack::all();
        return view('admin.product.edit', compact('product', 'services', 'techStacks'));
    }

    // ADMIN: Update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
            'tech_stack_ids' => 'nullable|array',
            'tech_stack_ids.*' => 'exists:tech_stacks,id',
        ]);

        // Update slug jika title berubah
        if ($product->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = $product->slug;
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('image_url')) {
            if ($product->image_url && file_exists(public_path('images/products/' . $product->image_url))) {
                unlink(public_path('images/products/' . $product->image_url));
            }
            $image = $request->file('image_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $validated['image_url'] = $imageName;
        }

        $product->update($validated);
        $product->techStacks()->sync($request->tech_stack_ids ?? []);

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diupdate.');
    }

    // ADMIN: Hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image_url && file_exists(public_path('images/products/' . $product->image_url))) {
            unlink(public_path('images/products/' . $product->image_url));
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function index()
    {
        return $this->adminIndex();
    }
}
