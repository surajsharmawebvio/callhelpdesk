<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    public function index()
    {
        $staticPage = StaticPage::where('route_name', 'disclaimer')->first();
        $seo = $staticPage?->seo;

        return view('disclaimer', compact('seo'));
    }
}