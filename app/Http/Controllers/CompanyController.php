<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index($companyName)
    {
        $url = route('company.show', $companyName);
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';

        $company = Company::with('questions')->where('url', $path)->first();

        return view('company', [
            'company' => $company
        ]);
    }

    public function searchCompanies(Request $request)
    {
        $query = $request->input('query');

        $companies = Company::where('name', 'like', '%' . $query . '%')->limit(10)->get()->toArray();

        return response()->json(array_values($companies));
    }

    public function companies(Request $request)
    {
        $letter = $request->get('letter', 'a');
        $perPage = 20; // Match the Vue component's companiesPerPage

        // Get paginated companies filtered by letter
        $companies = Company::where('name', 'like', $letter . '%')
            ->orderBy('name')
            ->paginate($perPage);

        return view('companies', [
            'companies' => $companies->items(),
            'currentLetter' => $letter,
            'currentPage' => $companies->currentPage(),
            'totalPages' => $companies->lastPage(),
            'totalCompanies' => $companies->total(),
            'pagination' => $companies
        ]);
    }
}
