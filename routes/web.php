<?php

use App\Livewire\AboutUsPage;
use App\Livewire\ContactUsPage;
use App\Livewire\HomePage;
use App\Livewire\ProductDetailsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/shop-details', ProductDetailsPage::class);
Route::get('/contact', ContactUsPage::class);
Route::get('/about', AboutUsPage::class);
