<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $staticPage = StaticPage::where('route_name', 'contact-us')->first();
        $seo = $staticPage?->seo;

        return view('contact-us', compact('seo'));
    }
}