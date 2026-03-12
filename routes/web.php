<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main landing page
Route::get('/', [PageController::class, 'home'])->name('home');

// About page
Route::get('/about', [PageController::class, 'about'])->name('about');

// Portfolio page
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');

// Portfolio single item
Route::get('/portfolio/{slug}', [PageController::class, 'portfolioItem'])->name('portfolio.item');

// Manifesto page
Route::get('/manifesto', [PageController::class, 'manifesto'])->name('manifesto');

// Contact page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Newsletter subscription
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Privacy & Terms
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
