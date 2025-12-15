<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class ContentHumenize extends Controller
{
    public function index()
    {
        $companies = Company::limit(5)->get();

        dd($companies);
    }
}
