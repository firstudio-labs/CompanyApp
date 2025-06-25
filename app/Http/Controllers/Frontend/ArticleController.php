<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('service')
            ->whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(8);

        return view('frontend.article.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::with('service')->where('slug', $slug)->firstOrFail();
        $recentArticles = Article::where('id', '!=', $article->id)
            ->orderByDesc('published_at')
            ->limit(5)
            ->get();

        return view('frontend.article.show', compact('article', 'recentArticles'));
    }
}
