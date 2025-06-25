<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('service')->latest()->paginate(10);
        return view('admin.article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with('service')->findOrFail($id);
        return view('admin.article.show', compact('article'));
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.article.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'service_id' => 'required|exists:services,id',
        ]);

        $article = new Article($request->except('image_url'));
        $article->slug = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = 'articles/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/articles'), $imageName);
            $article->image_url = 'images/articles/' . basename($imageName);
        }

        $article->save();

        return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $services = Service::all();
        return view('admin.article.edit', compact('article', 'services'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'service_id' => 'required|exists:services,id',
        ]);

        $article->fill($request->except('image_url'));

        // Update slug jika title berubah
        if ($article->isDirty('title')) {
            $article->slug = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada
            if ($article->image_url && file_exists(public_path($article->image_url))) {
                unlink(public_path($article->image_url));
            }
            $image = $request->file('image_url');
            $imageName = 'articles/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/articles'), $imageName);
            $article->image_url = 'images/articles/' . basename($imageName);
        }

        $article->save();

        return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image_url && file_exists(public_path($article->image_url))) {
            unlink(public_path($article->image_url));
        }
        $article->delete();
        return redirect()->route('admin.article.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
