<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service; // Pastikan model Service ada

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['service', 'techStacks'])->paginate(12);
        $services = Service::orderBy('title')->get();
        return view('frontend.product.index', compact('products', 'services'));
    }

    public function show($slug)
    {
        $product = Product::with(['service', 'techStacks'])->where('slug', $slug)->firstOrFail();
        return view('frontend.product.show', compact('product'));
    }
}
