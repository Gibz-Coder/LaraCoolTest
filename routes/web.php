<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/**
 * Landing Page Routes
 * 
 * These routes handle the main landing page functionality
 */

// Main landing page route
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Contact form submission route
Route::post('/contact', [LandingController::class, 'contact'])->name('contact.submit');

// Newsletter subscription route
Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/contacts', [App\Http\Controllers\AdminController::class, 'contacts'])->name('contacts');
    Route::get('/analytics', [App\Http\Controllers\AdminController::class, 'analytics'])->name('analytics');
});
