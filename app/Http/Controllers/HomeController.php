<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Load SEO data for home page
        $staticPage = StaticPage::where('route_name', 'home')->first();
        $seo = $staticPage?->seo;

        return view('home', compact('seo'));
    }
}
