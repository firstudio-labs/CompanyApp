<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Client;
use App\Models\TechStack;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display main admin dashboard with stats and recent data
     */
    public function index()
    {
        try {
            $user = Auth::user();

            // Statistik utama, cache 1 menit
            $stats = $this->getStats();

            // Data terbaru
            $recentProducts    = Product::latest()->take(5)->get();
            $recentPortfolios  = Portfolio::latest()->take(5)->get();
            $recentServices    = Service::latest()->take(5)->get();
            $recentArticles    = Article::latest()->take(5)->get();
            $recentContacts    = Contact::latest()->take(5)->get();
            $recentClients     = Client::latest()->take(5)->get();

            // Aktivitas user
            $latestActivity = User::whereNotNull('last_login_at')
                ->orderBy('last_login_at', 'desc')
                ->take(5)
                ->get();

            // Statistik visitor dummy (bisa diganti analytics)
            $visitors = $this->getMonthlyVisitors(date('Y'));

            // Statistik tambahan
            $totalTechStacks = TechStack::count();
            $totalCategories = Category::count();

            return view('admin.dashboard', compact(
                'user', 'stats', 'recentProducts', 'recentPortfolios', 'recentServices',
                'recentArticles', 'recentContacts', 'recentClients', 'latestActivity', 'visitors',
                'totalTechStacks', 'totalCategories'
            ));
        } catch (\Exception $e) {
            Log::error('Dashboard error: '.$e->getMessage());
            return view('admin.dashboard', [
                'error' => 'Terjadi kesalahan pada dashboard: '.$e->getMessage(),
                'user' => Auth::user(),
                'stats' => [],
                'recentProducts' => [],
                'recentPortfolios' => [],
                'recentServices' => [],
                'recentArticles' => [],
                'recentContacts' => [],
                'recentClients' => [],
                'latestActivity' => [],
                'visitors' => [],
                'totalTechStacks' => 0,
                'totalCategories' => 0,
            ]);
        }
    }

    /**
     * Get main statistics (can be reused)
     */
    public function getStats()
    {
        return Cache::remember('dashboard_stats', 60, function () {
            return [
                'total_users'      => User::count(),
                'total_products'   => Product::count(),
                'total_portfolios' => Portfolio::count(),
                'total_services'   => Service::count(),
                'total_articles'   => Article::count(),
                'total_contacts'   => Contact::count(),
                'total_clients'    => Client::count(),
            ];
        });
    }

    /**
     * Dummy visitor data (replace with analytics if available)
     */
    private function getMonthlyVisitors($year)
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $data = [];
        foreach ($months as $m) {
            $data[$m] = rand(50, 200);
        }
        return $data;
    }
}