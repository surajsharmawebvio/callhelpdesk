<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index($companyName)
    {
        $url = route('company.show', $companyName);
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';

        $company = Company::with('questions')->where('url', $path)->first();

        return Inertia::render('Company', [
            'company' => $company
        ]);
    }

    public function searchCompanies(Request $request)
    {
        $query = $request->input('query');

        $companies = Company::where('name', 'like', '%' . $query . '%')->limit(10)->get()->toArray();

        return response()->json(array_values($companies));
    }
}
