<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $staticPage = StaticPage::where('route_name', 'about-us')->first();
        $seo = $staticPage?->seo;

        return view('about-us', compact('seo'));
    }
}