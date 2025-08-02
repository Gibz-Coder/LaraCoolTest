@extends('layouts.app')

@section('title', $page_title ?? 'Welcome to LaraCoolTest')
@section('description', $meta_description ?? 'LaraCoolTest - A modern, responsive Laravel landing page showcasing clean design and best practices.')

@section('content')
    <!-- Skip to content link for accessibility -->
    <a href="#hero" class="skip-to-content">Skip to main content</a>
    
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-spinner"></div>
    </div>
    
    <!-- Scroll Progress Indicator -->
    <div class="scroll-progress"></div>
    
    <!-- Header Navigation -->
    @include('components.header')
    
    <!-- Hero Section -->
    @include('components.hero')
    
    <!-- Features Section -->
    @include('components.features', ['features' => $features ?? []])
    
    <!-- About Section -->
    @include('components.about', ['stats' => $stats ?? []])
    
    <!-- Contact Section -->
    @include('components.contact')
    
    <!-- Footer -->
    @include('components.footer')
@endsection

@push('styles')
<style>
/* Landing Page Specific Styles */
body {
    padding-top: 0; /* Remove default padding since we have fixed header */
}

/* Smooth scrolling for the entire page */
html {
    scroll-behavior: smooth;
}

/* Section spacing adjustments */
.section {
    position: relative;
}

/* Add some breathing room between sections */
.section + .section {
    margin-top: -1px; /* Prevent small gaps between sections */
}

/* Loading animation for the page */
.page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 1;
    visibility: visible;
    transition: all 0.5s ease;
}

.page-loader.hidden {
    opacity: 0;
    visibility: hidden;
}

.loader-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Scroll progress indicator */
.scroll-progress {
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 3px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    z-index: 9998;
    transition: width 0.1s ease;
}

/* Intersection observer animations */
.fade-in-up {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.fade-in-up.visible {
    opacity: 1;
    transform: translateY(0);
}

.fade-in-left {
    opacity: 0;
    transform: translateX(-30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.fade-in-left.visible {
    opacity: 1;
    transform: translateX(0);
}

.fade-in-right {
    opacity: 0;
    transform: translateX(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.fade-in-right.visible {
    opacity: 1;
    transform: translateX(0);
}

/* Skip to content link for accessibility */
.skip-to-content {
    position: absolute;
    top: -40px;
    left: 6px;
    background: var(--primary-color);
    color: white;
    padding: 8px;
    text-decoration: none;
    border-radius: 0 0 4px 4px;
    z-index: 10000;
    transition: top 0.3s ease;
}

.skip-to-content:focus {
    top: 0;
    color: white;
}

/* Print styles */
@media print {
    .navbar,
    .back-to-top,
    .scroll-progress {
        display: none !important;
    }
    
    .section {
        page-break-inside: avoid;
        margin: 0 !important;
        padding: 1rem 0 !important;
    }
    
    .hero-section {
        min-height: auto !important;
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .btn-primary {
        background-color: #000;
        border-color: #000;
        color: #fff;
    }
    
    .btn-primary:hover {
        background-color: #333;
        border-color: #333;
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    *,
    *::before,
    *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
        scroll-behavior: auto !important;
    }
    
    .fade-in-up,
    .fade-in-left,
    .fade-in-right {
        opacity: 1;
        transform: none;
    }
}

/* Focus styles for better accessibility */
a:focus,
button:focus,
input:focus,
textarea:focus,
select:focus {
    outline: 2px solid var(--primary-color);
    outline-offset: 2px;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--secondary-color);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Page loader
    const pageLoader = document.querySelector('.page-loader');
    if (pageLoader) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                pageLoader.classList.add('hidden');
                setTimeout(() => {
                    pageLoader.remove();
                }, 500);
            }, 500);
        });
    }
    
    // Scroll progress indicator
    const scrollProgress = document.querySelector('.scroll-progress');
    if (scrollProgress) {
        function updateScrollProgress() {
            const scrollTop = window.pageYOffset;
            const docHeight = document.body.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            scrollProgress.style.width = scrollPercent + '%';
        }
        
        window.addEventListener('scroll', updateScrollProgress);
        updateScrollProgress(); // Initialize
    }
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right');
    animatedElements.forEach(element => {
        observer.observe(element);
    });
    
    // Lazy loading for images (if any are added later)
    const lazyImages = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));
    
    // Keyboard navigation enhancement
    document.addEventListener('keydown', function(e) {
        // ESC key to close mobile menu
        if (e.key === 'Escape') {
            const navbarCollapse = document.querySelector('.navbar-collapse.show');
            if (navbarCollapse) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        }
    });
    
    // Performance monitoring (optional)
    if ('performance' in window) {
        window.addEventListener('load', function() {
            setTimeout(() => {
                const perfData = performance.getEntriesByType('navigation')[0];
                console.log('Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
            }, 0);
        });
    }
});
</script>
@endpush