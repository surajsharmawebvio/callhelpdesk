<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\StaticPage;

class CompanyController extends Controller
{
    public function index($phoneNumber='company', $companyName)
    {
        $url = route('company.show', ['phoneNumber' => $phoneNumber, 'companyName' => strtolower($companyName)]);
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';

        $company = Company::with(['questions', 'author'])->where('url', $path)->published()->first();

        // Load SEO data for company page
        $seo = $company?->seo;

        // Get breadcrumbs - use custom breadcrumbs if available, otherwise use default
        $breadcrumbs = $company && $company->breadcrumbs && count($company->breadcrumbs) > 0
            ? $company->breadcrumbs
            : [
                ['title' => 'All Companies', 'url' => route('companies.index')],
                ['title' => ($company->name ?? 'Company') . ' Customer Service', 'url' => $url],
            ];

        return view('company', [
            'company' => $company,
            'seo' => $seo,
            'page' => $company,
            'breadcrumbs' => $breadcrumbs,
            'phoneNumber' => $phoneNumber,
            'companyName' => $companyName,
        ]);
    }

    public function index2($phoneNumber='company', $companyName)
    {
        $url = route('company.show', ['phoneNumber' => $phoneNumber, 'companyName' => strtolower($companyName)]);
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';

        $company = Company::with(['questions', 'author'])->where('url', $path)->published()->first();

        // Load SEO data for company page
        $seo = $company?->seo;

        // Get breadcrumbs - use custom breadcrumbs if available, otherwise use default
        $breadcrumbs = $company && $company->breadcrumbs && count($company->breadcrumbs) > 0
            ? $company->breadcrumbs
            : [
                ['title' => 'All Companies', 'url' => route('companies.index')],
                ['title' => ($company->name ?? 'Company') . ' Customer Service', 'url' => $url],
            ];

        return view('company2', [
            'company' => $company,
            'seo' => $seo,
            'page' => $company,
            'breadcrumbs' => $breadcrumbs,
            'phoneNumber' => $phoneNumber,
            'companyName' => $companyName,
        ]);
    }

    public function searchCompanies(Request $request)
    {
        $query = $request->input('query');

        $companies = Company::where('name', 'like', '%' . $query . '%')->published()->limit(10)->get()->toArray();

        return response()->json(array_values($companies));
    }

    public function companies(Request $request)
    {
        $letter = $request->get('letter', 'a');
        $search = $request->get('search');
        $perPage = 10; // Match the Vue component's companiesPerPage

        // Add search filter if provided
        if ($search) {
             $query = Company::where('name', 'like', '%' . $search . '%')->published();
        }
        if (!$search && $letter) {
            $query = Company::where('name', 'like', $letter . '%')->published();
        }

        // Get paginated companies
        $companies = $query->orderBy('name')->paginate($perPage);

        // Load SEO data for companies page
        $page = StaticPage::where('route_name', 'companies')->first();
        $seo = $page?->seo;

        return view('companies', [
            'companies' => $companies->items(),
            'currentLetter' => $letter,
            'currentPage' => $companies->currentPage(),
            'totalPages' => $companies->lastPage(),
            'totalCompanies' => $companies->total(),
            'pagination' => $companies,
            'seo' => $seo,
            'page' => $page
        ]);
    }

    public function test(){
        $company = Company::count();

        


        print_r($company);
    }
}
