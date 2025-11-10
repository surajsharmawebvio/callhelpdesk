<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ HomeController, CompanyController };

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/phone-number/{companyName}', [CompanyController::class, 'index'])->name('company.show');
