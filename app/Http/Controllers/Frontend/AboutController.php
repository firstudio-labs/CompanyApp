<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $about = About::first();
            return view('frontend.about.index', compact('about'));
        } catch (\Exception $e) {
            Log::error('Error retrieving About information: ' . $e->getMessage());
            return view('frontend.about.index', ['about' => null]);
        }
    }
}
