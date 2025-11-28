<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    public function index()
    {
        $page = StaticPage::where('route_name', 'disclaimer')->first();
        $seo = $page?->seo;

        return view('disclaimer', compact('seo', 'page'));
    }
}