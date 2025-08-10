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
    
    <!-- Testimonials Section -->
    @include('components.testimonials', ['testimonials' => $testimonials ?? []])
    
    <!-- Contact Section -->
    @include('components.contact')
    
    <!-- Newsletter Section -->
    @include('components.newsletter')
    
    <!-- Footer -->
    @include('components.footer')
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>
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

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 1.2rem;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    transition: all 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.back-to-top:hover {
    background: var(--secondary-color);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.back-to-top:active {
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .back-to-top {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        font-size: 1rem;
    }
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
    
    // Back to Top Button
    const backToTopBtn = document.getElementById('back-to-top');
    if (backToTopBtn) {
        // Show/hide button based on scroll position
        function toggleBackToTop() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        }
        
        window.addEventListener('scroll', toggleBackToTop);
        toggleBackToTop(); // Initialize
        
        // Smooth scroll to top when clicked
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
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