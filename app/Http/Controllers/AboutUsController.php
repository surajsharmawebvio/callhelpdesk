<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $page = StaticPage::where('route_name', 'about-us')->first();
        $seo = $page?->seo;

        return view('about-us', compact('seo', 'page'));
    }
}