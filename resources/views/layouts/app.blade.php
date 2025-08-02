<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaraCoolTest') }} - @yield('title', 'Modern Laravel Landing Page')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'LaraCoolTest - A modern, responsive Laravel landing page showcasing clean design and best practices.')">
    <meta name="keywords" content="@yield('keywords', 'Laravel, landing page, modern design, responsive, web development')">
    <meta name="author" content="LaraCoolTest">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ config('app.name', 'LaraCoolTest') }} - @yield('title', 'Modern Laravel Landing Page')">
    <meta property="og:description" content="@yield('description', 'LaraCoolTest - A modern, responsive Laravel landing page showcasing clean design and best practices.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'LaraCoolTest') }} - @yield('title', 'Modern Laravel Landing Page')">
    <meta name="twitter:description" content="@yield('description', 'LaraCoolTest - A modern, responsive Laravel landing page showcasing clean design and best practices.')">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="font-inter antialiased">
    <div id="app">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>