<?php

use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\Customer;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;
use App\Livewire\AboutUsPage;
use App\Livewire\CartPage;
use App\Livewire\ContactUsPage;
use App\Livewire\HomePage;
use App\Livewire\LoginPage;
use App\Livewire\ProductDetailsPage;
use App\Livewire\ProfilePage;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/products', [ProductsController::class , 'index'])->name('admin.products');
        Route::get('/products/add', [ProductsController::class , 'add'])->name('admin.products.add');

        Route::post('/products/add', [ProductsController::class , 'add'])->name('admin.products.add.post');
        Route::get('/products/delete/{id}', [ProductsController::class , 'delete'])->name('admin.products.delete');
        Route::get('/products/edit/{id}', [ProductsController::class , 'edit'])->name('admin.products.edit');
        Route::post('/products/edit/{id}', [ProductsController::class , 'edit'])->name('admin.products.edit.post');

        Route::post('/products/image/{id}', [ProductsController::class , 'image_update'])->name('admin.products.image.update');
        

        Route::get('/categories', [ProductCategoriesController::class , 'index'])->name('admin.categories');
        Route::get('/categories/add', [ProductCategoriesController::class , 'add'])->name('admin.categories.add');

        Route::post('/categories/add', [ProductCategoriesController::class , 'add'])->name('admin.categories.add.post');
        Route::get('/categories/delete/{id}', [ProductCategoriesController::class , 'delete'])->name('admin.categories.delete');
        Route::get('/categories/edit/{id}', [ProductCategoriesController::class , 'edit'])->name('admin.categories.edit');
        Route::post('/categories/edit/{id}', [ProductCategoriesController::class , 'edit'])->name('admin.categories.edit.post');


        Route::get('/settings', [SettingsController::class , 'index'])->name('admin.settings');
        Route::post('/settings', [SettingsController::class , 'index'])->name('admin.settings.update.post');

        Route::post('/logout', [AdminAuth::class , 'logout'])->name('admin.logout');
    });

    Route::get('/login', function () {
        return view('auth.login');
    })->name('admin.login');
    
    Route::post('/login', [AdminAuth::class , 'login'])->name('admin.login.post');

});

Route::get('/', HomePage::class)->name('homepage');
Route::get('/plant/{slug}', ProductDetailsPage::class)->name('product.details');
Route::get('/contact', ContactUsPage::class)->name('contact.us');
Route::get('/about', AboutUsPage::class)->name('about.us');
Route::get('/login', [Customer::class , 'login'])->name('login.page');
Route::get('/cart', CartPage::class)->name('cart.page');


Route::group(['middleware' => 'auth:customer'], function () {
    Route::get('/profile', [Customer::class , 'profile'])->name('profile.page');
});

