<section id="hero" class="hero-section">
    <div class="hero-background">
        <div class="hero-overlay"></div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="hero-content fade-in-up">
                    <h1 class="hero-title">
                        Welcome to 
                        <span class="text-primary">LaraCoolTest</span>
                    </h1>
                    <p class="hero-subtitle lead">
                        A modern, responsive Laravel landing page showcasing clean design, 
                        best practices, and powerful functionality. Built with the latest 
                        Laravel framework and Bootstrap.
                    </p>
                    <div class="hero-buttons mt-4">
                        <a href="#features" class="btn btn-primary btn-lg me-3 smooth-scroll">
                            <i class="fas fa-rocket me-2"></i>
                            Explore Features
                        </a>
                        <a href="#contact" class="btn btn-outline-secondary btn-lg smooth-scroll">
                            <i class="fas fa-envelope me-2"></i>
                            Get in Touch
                        </a>
                    </div>
                    
                    <!-- Hero Stats -->
                    <div class="hero-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item text-center">
                                    <h3 class="stat-number text-primary">100%</h3>
                                    <p class="stat-label">Responsive</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item text-center">
                                    <h3 class="stat-number text-primary">99.9%</h3>
                                    <p class="stat-label">Uptime</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item text-center">
                                    <h3 class="stat-number text-primary">24/7</h3>
                                    <p class="stat-label">Support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-image fade-in">
                    <div class="hero-illustration">
                        <!-- Placeholder for hero illustration/image -->
                        <div class="illustration-placeholder">
                            <i class="fas fa-code fa-5x text-primary mb-3"></i>
                            <h4>Modern Development</h4>
                            <p>Built with Laravel & Bootstrap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="scroll-indicator">
        <a href="#features" class="scroll-down smooth-scroll">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

@push('styles')
<style>
/* Hero Section Styles */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding-top: 80px; /* Account for fixed header */
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    z-index: -2;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.9);
    z-index: -1;
}

.hero-content {
    padding: 2rem 0;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    color: var(--text-dark);
}

.hero-subtitle {
    font-size: 1.25rem;
    color: var(--text-light);
    margin-bottom: 2rem;
    line-height: 1.6;
}

.hero-buttons .btn {
    padding: 1rem 2rem;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.hero-buttons .btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

/* Hero Stats */
.hero-stats {
    padding-top: 2rem;
    border-top: 1px solid var(--border-color);
}

.stat-item {
    padding: 1rem 0;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 0;
    font-weight: 500;
}

/* Hero Image */
.hero-image {
    padding: 2rem 0;
    text-align: center;
}

.illustration-placeholder {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 1rem;
    padding: 3rem 2rem;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.illustration-placeholder h4 {
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.illustration-placeholder p {
    color: var(--text-light);
    margin-bottom: 0;
}

/* Scroll Indicator */
.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
}

.scroll-down {
    display: inline-block;
    color: var(--primary-color);
    font-size: 1.5rem;
    text-decoration: none;
    animation: bounce 2s infinite;
    transition: all 0.3s ease;
}

.scroll-down:hover {
    color: var(--secondary-color);
    transform: scale(1.2);
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .hero-buttons .btn {
        padding: 0.875rem 1.5rem;
        margin-bottom: 1rem;
        display: block;
        text-align: center;
    }
    
    .hero-buttons .btn:last-child {
        margin-bottom: 0;
    }
    
    .hero-stats {
        margin-top: 2rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}

@media (max-width: 767.98px) {
    .hero-section {
        padding-top: 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .illustration-placeholder {
        padding: 2rem 1rem;
    }
    
    .illustration-placeholder .fa-5x {
        font-size: 3rem !important;
    }
}
</style>
@endpush