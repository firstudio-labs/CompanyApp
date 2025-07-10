<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    // Tampilkan About (hanya 1 data)
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    // Tampilkan form edit About
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    // Simpan atau update About (hanya 1 data)
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'text_banner' => 'required|string|max:255',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:100',
            'website' => 'nullable|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        $about = About::first() ?? new About();
        $about->fill($request->except('image_url'));

        // Image upload
        if ($request->hasFile('image_url')) {
            if ($about->image_url && file_exists(public_path($about->image_url))) {
                unlink(public_path($about->image_url));
            }
            $image = $request->file('image_url');
            $imageName = 'about-' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/about');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $imageName);
            $about->image_url = 'images/about/' . $imageName;
        }

        // Image banner upload
        if ($request->hasFile('image_banner')) {
            if ($about->image_banner && file_exists(public_path($about->image_banner))) {
                unlink(public_path($about->image_banner));
            }
            $imageBanner = $request->file('image_banner');
            $imageBannerName = 'about-banner-' . time() . '.' . $imageBanner->getClientOriginalExtension();
            $bannerPath = public_path('images/about');
            if (!file_exists($bannerPath)) {
                mkdir($bannerPath, 0777, true);
            }
            $imageBanner->move($bannerPath, $imageBannerName);
            $about->image_banner = 'images/about/' . $imageBannerName;
        }

        $about->save();

        return redirect()->route('admin.about.index')->with('success', 'Informasi About berhasil disimpan.');
    }
}
