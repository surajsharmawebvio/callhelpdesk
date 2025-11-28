<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $page = StaticPage::where('route_name', 'contact-us')->first();
        $seo = $page?->seo;

        return view('contact-us', compact('seo', 'page'));
    }
}