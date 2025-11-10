<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, CompanyController, ContactUsController };

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/phone-number/{companyName}', [CompanyController::class, 'index'])->name('company.show');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
