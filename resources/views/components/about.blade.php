<section id="about" class="about-section section">
    <div class="container">
        <div class="row align-items-center">
            <!-- About Content -->
            <div class="col-lg-6">
                <div class="about-content" data-aos="fade-right">
                    <h2 class="section-title">About LaraCoolTest</h2>
                    <p class="section-subtitle">
                        LaraCoolTest is more than just a landing page - it's a showcase of modern web development 
                        practices using Laravel and Bootstrap. Built with attention to detail and user experience.
                    </p>
                    
                    <div class="about-text">
                        <p>
                            Our project demonstrates the power of Laravel's elegant syntax combined with Bootstrap's 
                            responsive design capabilities. Every component has been carefully crafted to provide 
                            an exceptional user experience across all devices.
                        </p>
                        
                        <p>
                            Whether you're a developer looking for inspiration, a client seeking a professional 
                            landing page, or someone interested in modern web technologies, LaraCoolTest offers 
                            a perfect blend of functionality and aesthetics.
                        </p>
                    </div>
                    
                    <!-- Key Points -->
                    <div class="about-points mt-4">
                        <div class="point-item">
                            <i class="fas fa-check-circle text-primary me-3"></i>
                            <span>Built with Laravel 11 and Bootstrap 5</span>
                        </div>
                        <div class="point-item">
                            <i class="fas fa-check-circle text-primary me-3"></i>
                            <span>Fully responsive and mobile-optimized</span>
                        </div>
                        <div class="point-item">
                            <i class="fas fa-check-circle text-primary me-3"></i>
                            <span>SEO-friendly and performance optimized</span>
                        </div>
                        <div class="point-item">
                            <i class="fas fa-check-circle text-primary me-3"></i>
                            <span>Clean, maintainable code structure</span>
                        </div>
                    </div>
                    
                    <div class="about-buttons mt-4">
                        <a href="#contact" class="btn btn-primary me-3 smooth-scroll">
                            <i class="fas fa-envelope me-2"></i>
                            Get in Touch
                        </a>
                        <a href="https://github.com" target="_blank" class="btn btn-outline-secondary">
                            <i class="fab fa-github me-2"></i>
                            View on GitHub
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- About Image/Illustration -->
            <div class="col-lg-6">
                <div class="about-image" data-aos="fade-left">
                    <div class="image-container">
                        <!-- Placeholder for about image -->
                        <div class="about-illustration">
                            <div class="illustration-bg">
                                <i class="fas fa-laptop-code fa-4x text-primary mb-3"></i>
                                <h4>Modern Development</h4>
                                <p>Crafted with the latest technologies</p>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="floating-element element-1">
                            <i class="fab fa-laravel"></i>
                        </div>
                        <div class="floating-element element-2">
                            <i class="fab fa-bootstrap"></i>
                        </div>
                        <div class="floating-element element-3">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Statistics Section -->
        @if(isset($stats) && is_array($stats))
        <div class="row mt-5">
            <div class="col-12">
                <div class="stats-container" data-aos="fade-up">
                    <div class="row text-center">
                        @foreach($stats as $index => $stat)
                        <div class="col-lg-4 col-md-4">
                            <div class="stat-item">
                                <h3 class="stat-number" data-count="{{ $stat['number'] ?? '0' }}">
                                    {{ $stat['number'] ?? '0' }}
                                </h3>
                                <p class="stat-label">{{ $stat['label'] ?? 'Statistic' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@push('styles')
<style>
/* About Section Styles */
.about-section {
    position: relative;
    background: white;
}

.about-content {
    padding: 2rem 0;
}

.about-text p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: var(--text-light);
    margin-bottom: 1.5rem;
}

/* About Points */
.about-points {
    margin: 2rem 0;
}

.point-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 1.1rem;
    color: var(--text-dark);
}

.point-item:last-child {
    margin-bottom: 0;
}

.point-item i {
    font-size: 1.2rem;
}

/* About Buttons */
.about-buttons .btn {
    padding: 0.875rem 2rem;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.about-buttons .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* About Image */
.about-image {
    padding: 2rem 0;
    position: relative;
}

.image-container {
    position: relative;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-illustration {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 1rem;
    padding: 3rem 2rem;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 350px;
}

.illustration-bg h4 {
    color: var(--text-dark);
    margin-bottom: 1rem;
    font-weight: 600;
}

.illustration-bg p {
    color: var(--text-light);
    margin-bottom: 0;
}

/* Floating Elements */
.floating-element {
    position: absolute;
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    z-index: 3;
    animation: float 3s ease-in-out infinite;
}

.floating-element i {
    font-size: 1.5rem;
    color: var(--primary-color);
}

.element-1 {
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.element-2 {
    top: 60%;
    right: 15%;
    animation-delay: 1s;
}

.element-3 {
    bottom: 20%;
    left: 20%;
    animation-delay: 2s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Statistics */
.stats-container {
    background: var(--bg-light);
    border-radius: 1rem;
    padding: 3rem 2rem;
    margin-top: 3rem;
}

.stat-item {
    padding: 1rem 0;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    display: block;
}

.stat-label {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 0;
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .about-content {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .about-buttons .btn {
        margin-bottom: 1rem;
        display: block;
    }
    
    .about-buttons .btn:last-child {
        margin-bottom: 0;
    }
    
    .image-container {
        height: 300px;
    }
    
    .about-illustration {
        padding: 2rem 1.5rem;
    }
    
    .floating-element {
        width: 50px;
        height: 50px;
    }
    
    .floating-element i {
        font-size: 1.25rem;
    }
}

@media (max-width: 767.98px) {
    .about-text p {
        font-size: 1rem;
    }
    
    .point-item {
        font-size: 1rem;
    }
    
    .image-container {
        height: 250px;
    }
    
    .about-illustration .fa-4x {
        font-size: 2.5rem !important;
    }
    
    .stats-container {
        padding: 2rem 1rem;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .stat-label {
        font-size: 1rem;
    }
}
</style>
@endpush