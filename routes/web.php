<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/submit', [HomeController::class, 'submitContact'])->name('contact.submit');

Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
