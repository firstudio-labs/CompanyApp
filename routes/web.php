<?php

use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use App\Http\Controllers\Admin\TechstackController as AdminTechStackController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SlideController;

use App\Http\Controllers\Frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\Frontend\ArticleController as FrontendArticleController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ======================================================================
// PUBLIC ROUTES
// ======================================================================

// Home & Static Pages
Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/about', [FrontendAboutController::class, 'index'])->name('about');

// Article Routes
Route::get('/article', [FrontendArticleController::class, 'index'])->name('article');
Route::get('/article/{slug}', [FrontendArticleController::class, 'show'])->name('article.show');

// Contact Routes
Route::get('/contact', [FrontendContactController::class, 'index'])->name('contact');
Route::post('/contact', [FrontendContactController::class, 'store'])->name('contact.store');

// Frontend Service Routes
Route::get('/service', [FrontendServiceController::class, 'index'])->name('services');
Route::get('/service/{slug}', [FrontendServiceController::class, 'show'])->name('services.show');

// Portfolio Routes
Route::get('/portfolio', [FrontendPortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');

// Product Routes
Route::get('/product', [FrontendProductController::class, 'index'])->name('products');
Route::get('/product/{slug}', [FrontendProductController::class, 'show'])->name('products.show');

// ======================================================================
// AUTHENTICATION ROUTES
// ======================================================================

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ======================================================================
// USER AUTHENTICATED ROUTES
// ======================================================================

Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('profile');
        Route::get('/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::put('/update-password', [AdminProfileController::class, 'updatePassword'])->name('profile.update-password');
        Route::put('/update-avatar', [AdminProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    });
});

// ======================================================================
// ADMIN ROUTES
// ======================================================================

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard Routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    // Admin Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'adminIndex'])->name('admin.profile');
        Route::get('/edit', [AdminProfileController::class, 'adminEdit'])->name('admin.profile.edit');
        Route::put('/update', [AdminProfileController::class, 'adminUpdate'])->name('admin.profile.update');
        Route::put('/update-password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.profile.update-password');
        Route::put('/update-avatar', [AdminProfileController::class, 'adminUpdateAvatar'])->name('admin.profile.update-avatar');
        Route::get('/remove-avatar', [AdminProfileController::class, 'adminRemoveAvatar'])->name('admin.profile.remove-avatar');
    });

    // Resource Routes for Admin
    Route::resource('product', AdminProductController::class, ['as' => 'admin']);
    Route::resource('service', AdminServiceController::class, ['as' => 'admin']);
    Route::resource('portfolio', AdminPortfolioController::class, ['as' => 'admin']);
    Route::resource('article', AdminArticleController::class, ['as' => 'admin']);
    Route::resource('contact', AdminContactController::class, ['as' => 'admin']);
    Route::resource('users', AdminUserController::class, ['as' => 'admin']);
    Route::resource('client', AdminClientController::class, ['as' => 'admin']);
    Route::resource('techstack', AdminTechStackController::class, ['as' => 'admin']);
    Route::resource('category', AdminCategoryController::class, ['as' => 'admin']);
    Route::resource('slide', SlideController::class, ['as' => 'admin']);

    // About Management (single data)
    Route::get('about', [AdminAboutController::class, 'index'])->name('admin.about.index');
    Route::get('about/edit', [AdminAboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('about', [AdminAboutController::class, 'storeOrUpdate'])->name('admin.about.storeOrUpdate');

    // Admin Contact
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::resource('contact', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::delete('contact/bulk-destroy', [AdminContactController::class, 'bulkDestroy'])->name('admin.contact.bulk-destroy');
        Route::put('contact/{contact}/mark-as-replied', [AdminContactController::class, 'markAsReplied'])->name('admin.contact.mark-as-replied');
    });
});