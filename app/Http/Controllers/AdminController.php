<?php

namespace App\Http\Controllers;

use App\Models\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    public function downloadDocument($id)
    {
        // Find the company request
        $companyRequest = CompanyRequest::findOrFail($id);

        // Check if document exists
        if (!$companyRequest->document_path || !Storage::disk('public')->exists($companyRequest->document_path)) {
            abort(404, 'Document not found');
        }

        // Get file path and name
        $filePath = $companyRequest->document_path;
        $fileName = basename($filePath);

        // Return streamed response for secure viewing
        return response()->file(Storage::disk('public')->path($filePath), [
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }
}