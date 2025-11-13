<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, CompanyController, ContactUsController, AboutUsController, PrivacyPolicyController, TermsAndConditionsController, DisclaimerController };

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'companies'])->name('companies.index');
Route::get('/phone-number/{companyName}', [CompanyController::class, 'index'])->name('company.show');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
