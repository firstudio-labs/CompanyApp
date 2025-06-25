<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Article;
use App\Models\Client;
use App\Models\Service;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::latest()->first();

        $products = Product::with(['service', 'techStacks'])
            ->latest()->limit(3)->get();

        $portfolios = Portfolio::with(['service', 'techStacks'])
            ->latest()->limit(3)->get();

        $articles = Article::with('service')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)->get();

        $clients = Client::with('service')
            ->latest()->limit(6)->get();

        $services = Service::latest()->limit(6)->get();

        $slides = Slide::where('is_active', 1)->orderBy('order')->get();

        return view('frontend.home', compact(
            'about', 'products', 'portfolios', 'articles', 'clients', 'services', 'slides'
        ));
    }
}