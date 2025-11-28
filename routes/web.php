<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, CompanyController, ContactController, ContactUsController, AboutUsController, PrivacyPolicyController, TermsAndConditionsController, DisclaimerController, SitemapPageController };

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'companies'])->name('companies.index');
Route::get('/sitemap', [SitemapPageController::class, 'index'])->name('sitemap');
Route::get('/{phoneNumber}/{companyName}', [CompanyController::class, 'index'])
    ->name('company.show')
    ->where([
        'phoneNumber' => '[a-zA-Z0-9]+',  // Allow letters and numbers
        'companyName' => '[a-zA-Z0-9-]+'   // Allow letters, numbers, hyphens
    ]);
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');
// Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');

// Redirect all 404 pages to home
Route::fallback(function () {
    return redirect()->route('home');
});
