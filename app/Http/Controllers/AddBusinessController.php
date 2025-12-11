<?php

namespace App\Http\Controllers;

use App\Models\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AddBusinessController extends Controller
{
    /**
     * Google reCAPTCHA Setup Instructions:
     *
     * 1. Go to https://www.google.com/recaptcha/admin
     * 2. Create a new reCAPTCHA v2 "I'm not a robot" Checkbox
     * 3. Add your domain (localhost for development, your production domain for production)
     * 4. Copy the Site Key and Secret Key
     * 5. Add to your .env file:
     *    RECAPTCHA_SITE_KEY=your_site_key_here
     *    RECAPTCHA_SECRET_KEY=your_secret_key_here
     * 6. Clear and rebuild config cache:
     *    php artisan config:clear
     *    php artisan config:cache
     *
     * Production Deployment:
     * - Ensure RECAPTCHA_SITE_KEY and RECAPTCHA_SECRET_KEY are set in production .env
     * - Run: php artisan config:cache after deployment
     * - If reCAPTCHA is not working, check browser console for errors
     */
    public function index()
    {
        return view('add-business', [
            'recaptchaSiteKey' => config('services.recaptcha.site_key'),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
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
        ];

        // Add reCAPTCHA validation only if configured
        if (config('services.recaptcha.secret')) {
            $rules['g-recaptcha-response'] = 'required|string';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaSecret = config('services.recaptcha.secret');

        if ($recaptchaSecret && $recaptchaResponse) {
            $verifyResponse = $this->verifyRecaptcha($recaptchaResponse, $recaptchaSecret);

            if (!$verifyResponse['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed. Please try again.'
                ], 422);
            }
        } elseif ($recaptchaSecret) {
            // reCAPTCHA is configured but not completed
            return response()->json([
                'success' => false,
                'message' => 'Please complete the reCAPTCHA verification.'
            ], 422);
        }
        // If no reCAPTCHA secret is configured, skip verification (for development)

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

    private function verifyRecaptcha($response, $secret)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secret,
            'response' => $response,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return json_decode($result, true);
    }
}
