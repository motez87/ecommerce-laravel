<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;

// Routes publiques
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// API Routes
Route::get('/api/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('api.products.search');

// Pages statiques
Route::get('/retours', [PageController::class, 'returns'])->name('pages.returns');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/faq', [PageController::class, 'faq'])->name('pages.faq');

// Routes Admin (connexion séparée)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    
    // Dashboard Admin (protégé)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Gestion des utilisateurs
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        
        // Gestion des produits
        Route::get('/products', [App\Http\Controllers\Admin\AdminManageProductController::class, 'index'])->name('products');
        Route::get('/products/create', [App\Http\Controllers\Admin\AdminManageProductController::class, 'create'])->name('products.create');
        Route::post('/products', [App\Http\Controllers\Admin\AdminManageProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [App\Http\Controllers\Admin\AdminManageProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [App\Http\Controllers\Admin\AdminManageProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [App\Http\Controllers\Admin\AdminManageProductController::class, 'destroy'])->name('products.destroy');
    });
});

// Routes d'authentification (fournies par Breeze)
require __DIR__.'/auth.php';

// Routes protégées
Route::middleware(['auth'])->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Panier
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    });
    
    // Commandes
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::delete('/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
        Route::get('/{order}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');
    });
    
    // Avis
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});