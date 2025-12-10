<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, CompanyController, ContactController, ContactUsController, AboutUsController, AuthorController, PrivacyPolicyController, TermsAndConditionsController, SitemapPageController, DisclaimerController, RssFeedController };

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'companies'])->name('companies.index');
Route::get('/sitemap', [SitemapPageController::class, 'index'])->name('sitemap');
Route::get('/company/sitemap.xml', function () {
    $xml = app(\Webvio\DynamicSitemap\Services\SitemapManager::class)->getSectionByPath('/company/sitemap.xml');
    return response($xml, 200, config('dynamic-sitemap.headers'));
})->name('sitemap.company');

// RSS Feed Routes
Route::get('/rss/companies.xml', [RssFeedController::class, 'companies'])->name('rss.companies');
Route::get('/rss/companies/category/{categoryId}.xml', [RssFeedController::class, 'companyCategory'])->name('rss.companies.category');
Route::get('/rss/company/{phoneNumber}/{companyName}.xml', [RssFeedController::class, 'company'])
    ->name('rss.company')
    ->where([
        'phoneNumber' => '[a-zA-Z0-9]+',
        'companyName' => '[a-zA-Z0-9-]+'
    ]);

Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/author', [AuthorController::class, 'index'])->name('author');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');
Route::get('/terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-and-conditions');
#Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/{phoneNumber}/{companyName}', [CompanyController::class, 'index'])
    ->name('company.show')
    ->where([
        'phoneNumber' => '[a-zA-Z0-9]+',  // Allow letters and numbers
        'companyName' => '[a-zA-Z0-9-]+'   // Allow letters, numbers, hyphens
    ]);
Route::get('/search-companies', [CompanyController::class, 'searchCompanies'])->name('companies.search');

// Redirect all 404 pages to home
Route::fallback(function () {
    return redirect()->route('home');
});
