<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $staticPage = StaticPage::where('route_name', 'terms-and-conditions')->first();
        $seo = $staticPage?->seo;

        return view('terms-and-conditions', compact('seo'));
    }
}