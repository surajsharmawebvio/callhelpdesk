<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $staticPage = StaticPage::where('route_name', 'privacy-policy')->first();
        $seo = $staticPage?->seo;

        return view('privacy-policy', compact('seo'));
    }
}