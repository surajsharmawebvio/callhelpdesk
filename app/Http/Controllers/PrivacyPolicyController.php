<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $page = StaticPage::where('route_name', 'privacy-policy')->first();
        $seo = $page?->seo;

        return view('privacy-policy', compact('seo', 'page'));
    }
}