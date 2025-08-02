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

        // Here you would typically save to database or send email
        // For demonstration, we'll just log the contact attempt
        \Log::info('Contact form submission', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? 'No subject',
            'message' => substr($validated['message'], 0, 100) . '...',
            'timestamp' => now(),
            'ip_address' => $request->ip()
        ]);

        // Flash success message with personalized greeting
        $successMessage = "Thank you, {$validated['name']}! Your message has been received and we'll get back to you soon.";
        
        return redirect()->back()->with('success', $successMessage);
    }
}
