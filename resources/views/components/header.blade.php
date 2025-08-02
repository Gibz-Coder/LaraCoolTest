<header id="header" class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <!-- Brand Logo/Name -->
        <a class="navbar-brand fw-bold text-primary" href="{{ route('landing') }}">
            <i class="fas fa-rocket me-2"></i>
            LaraCoolTest
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link smooth-scroll" href="#contact">Contact</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="btn btn-primary btn-sm" href="#contact">Get Started</a>
                </li>
            </ul>
        </div>
    </div>
</header>

@push('styles')
<style>
/* Header Styles */
#header {
    transition: all 0.3s ease;
    padding: 1rem 0;
    z-index: 1000;
}

#header.scrolled {
    padding: 0.5rem 0;
    background-color: rgba(255, 255, 255, 0.95) !important;
    backdrop-filter: blur(10px);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 700;
    transition: all 0.3s ease;
}

.navbar-brand:hover {
    transform: scale(1.05);
}

.navbar-nav .nav-link {
    font-weight: 500;
    color: var(--text-dark) !important;
    margin: 0 0.5rem;
    padding: 0.5rem 1rem !important;
    border-radius: 0.375rem;
    transition: all 0.3s ease;
    position: relative;
}

.navbar-nav .nav-link:hover {
    color: var(--primary-color) !important;
    background-color: rgba(59, 130, 246, 0.1);
}

.navbar-nav .nav-link.active {
    color: var(--primary-color) !important;
    background-color: rgba(59, 130, 246, 0.1);
}

/* Mobile Menu Styles */
.navbar-toggler {
    padding: 0.25rem 0.5rem;
    border: none !important;
    box-shadow: none !important;
}

.navbar-toggler:focus {
    box-shadow: none;
}

.navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

/* Mobile Responsive */
@media (max-width: 991.98px) {
    .navbar-collapse {
        background-color: white;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        margin-top: 1rem;
        padding: 1rem;
    }
    
    .navbar-nav .nav-link {
        margin: 0.25rem 0;
        text-align: center;
    }
    
    .navbar-nav .btn {
        margin-top: 1rem;
        text-align: center;
    }
}

/* Smooth scroll offset for fixed header */
html {
    scroll-padding-top: 80px;
}
</style>
@endpush