<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ContactFormRequest;

/**
 * LandingController handles the main landing page functionality
 * 
 * This controller manages the display of the landing page and handles
 * any form submissions or interactions on the landing page.
 */
class LandingController extends Controller
{
    /**
     * Display the landing page
     * 
     * @return View
     */
    public function index(): View
    {
        // Data to pass to the landing page view
        $data = [
            'page_title' => 'Welcome to LaraCoolTest',
            'meta_description' => 'LaraCoolTest - A modern, responsive Laravel landing page showcasing clean design and best practices.',
            'features' => [
                [
                    'title' => 'Modern Design',
                    'description' => 'Clean, contemporary design that looks great on all devices',
                    'icon' => 'fas fa-paint-brush'
                ],
                [
                    'title' => 'Laravel Powered',
                    'description' => 'Built with the latest Laravel framework for reliability and performance',
                    'icon' => 'fab fa-laravel'
                ],
                [
                    'title' => 'Responsive Layout',
                    'description' => 'Fully responsive design that works perfectly on mobile, tablet, and desktop',
                    'icon' => 'fas fa-mobile-alt'
                ],
                [
                    'title' => 'Easy to Customize',
                    'description' => 'Well-structured code that makes customization and extension simple',
                    'icon' => 'fas fa-cogs'
                ]
            ],
            'stats' => [
                [
                    'number' => '100%',
                    'label' => 'Responsive'
                ],
                [
                    'number' => '99.9%',
                    'label' => 'Uptime'
                ],
                [
                    'number' => '24/7',
                    'label' => 'Support'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Johnson',
                    'position' => 'Web Developer',
                    'text' => 'This platform has completely transformed how I approach web development. The clean design and powerful features make it a joy to work with.',
                    'rating' => 5
                ],
                [
                    'name' => 'Michael Chen',
                    'position' => 'Startup Founder',
                    'text' => 'Incredible performance and reliability. Our team productivity has increased significantly since we started using this solution.',
                    'rating' => 5
                ],
                [
                    'name' => 'Emily Rodriguez',
                    'position' => 'UI/UX Designer',
                    'text' => 'The attention to detail and user experience is outstanding. It\'s exactly what we needed for our projects.',
                    'rating' => 5
                ]
            ]
        ];

        return view('landing', $data);
    }

    /**
     * Handle contact form submission
     * 
     * @param ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(ContactFormRequest $request)
    {
        // Get validated data from the form request
        $validated = $request->validated();

        try {
            // Save contact to database
            $contact = \App\Models\Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'] ?? 'General Inquiry',
                'message' => $validated['message'],
                'ip_address' => $request->ip(),
            ]);

            // Log the contact submission for monitoring
            \Log::info('Contact form submission saved', [
                'contact_id' => $contact->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'timestamp' => now(),
            ]);

            // Flash success message with personalized greeting
            $successMessage = "Thank you, {$validated['name']}! Your message has been received and we'll get back to you soon.";
            
            return redirect()->back()->with('success', $successMessage);

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Contact form submission failed', [
                'error' => $e->getMessage(),
                'data' => $validated,
                'timestamp' => now(),
            ]);

            // Return with error message
            return redirect()->back()
                ->with('error', 'Sorry, there was an issue sending your message. Please try again.')
                ->withInput();
        }
    }
}
