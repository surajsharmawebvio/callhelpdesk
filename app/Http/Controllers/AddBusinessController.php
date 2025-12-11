<?php

namespace App\Http\Controllers;

use App\Models\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AddBusinessController extends Controller
{
    public function index()
    {
        return view('add-business');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'country_code' => 'required|string|max:10',
            'country_name' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
            'description' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB max
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->only([
            'business_name',
            'email',
            'website',
            'category',
            'address',
            'country_code',
            'country_name',
            'phone',
            'description',
        ]);

        // Handle document upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('company-documents', 'public');
            $data['document_path'] = $documentPath;
        }

        $companyRequest = CompanyRequest::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Your business listing has been submitted successfully! We will review it and get back to you shortly.',
            'data' => $companyRequest
        ]);
    }
}
