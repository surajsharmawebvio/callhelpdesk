<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyCategory;

class SitemapPageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $companies = Company::select('id', 'url', 'name')
                ->orderBy('name')
                ->paginate(50);
                
            $groupedCompanies = $companies->getCollection()->groupBy(function($company) {
                return strtoupper(substr($company->name, 0, 1));
            })->sortKeys();
            
            return response()->json([
                'companies' => $groupedCompanies,
                'has_more' => $companies->hasMorePages(),
                'next_page' => $companies->currentPage() + 1
            ]);
        }
        
        $companies = Company::select('id', 'url', 'name')
            ->orderBy('name')
            ->paginate(200);
            
        return view('sitemap', compact('companies'));
    }
}
