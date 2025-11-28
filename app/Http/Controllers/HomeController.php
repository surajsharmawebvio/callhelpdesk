<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Load SEO data for home page
        $page = StaticPage::where('route_name', 'home')->first();
        $seo = $page?->seo;

        return view('home', compact('seo', 'page'));
    }
}
