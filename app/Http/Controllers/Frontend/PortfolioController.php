<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service', 'techStacks')->latest()->paginate(12);
        $services = Service::all();
        return view('frontend.portfolio.index', compact('portfolios', 'services'));
    }

    public function show($slug)
    {
        $portfolio = Portfolio::with('service')->where('slug', $slug)->firstOrFail();
        return view('frontend.portfolio.show', compact('portfolio'));
    }
}
