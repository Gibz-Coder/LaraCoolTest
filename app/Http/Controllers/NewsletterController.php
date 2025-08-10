<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    /**
     * Handle newsletter subscription
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function subscribe(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // For now, we'll just log the subscription
            // Later this can be connected to a mailing service like Mailchimp
            Log::info('Newsletter subscription', [
                'email' => $request->email,
                'name' => $request->name,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);

        } catch (\Exception $e) {
            Log::error('Newsletter subscription failed', [
                'error' => $e->getMessage(),
                'email' => $request->email,
                'timestamp' => now(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an issue with your subscription. Please try again.'
            ], 500);
        }
    }
}
