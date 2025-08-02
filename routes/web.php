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
