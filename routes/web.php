<?php

use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\ProductsController;
use App\Livewire\AboutUsPage;
use App\Livewire\ContactUsPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailsPage;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/products', [ProductsController::class , 'index'])->name('admin.products');
        Route::get('/products/add', [ProductsController::class , 'add'])->name('admin.products.add');

        Route::post('/products/add', [ProductsController::class , 'add'])->name('admin.products.add.post');
        
        Route::post('/logout', [AdminAuth::class , 'logout'])->name('admin.logout');
    });

    Route::get('/login', function () {
        return view('auth.login');
    })->name('admin.login');
    
    Route::post('/login', [AdminAuth::class , 'login'])->name('admin.login.post');

});

Route::get('/', HomePage::class);
Route::get('/shop-details', ProductDetailsPage::class);
Route::get('/contact', ContactUsPage::class);
Route::get('/about', AboutUsPage::class);
