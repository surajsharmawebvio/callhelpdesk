<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $page = StaticPage::where('route_name', 'author')->first();
        $seo = $page?->seo;
        
        $authors = Author::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('author', compact('seo', 'page', 'authors'));
    }
}
