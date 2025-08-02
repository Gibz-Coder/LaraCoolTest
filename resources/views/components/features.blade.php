<section id="features" class="features-section section bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Powerful Features</h2>
                <p class="section-subtitle">
                    Discover what makes LaraCoolTest the perfect choice for your next project. 
                    Built with modern technologies and best practices.
                </p>
            </div>
        </div>
        
        <!-- Features Grid -->
        <div class="row g-4 mt-4">
            @if(isset($features) && is_array($features))
                @foreach($features as $index => $feature)
                    <div class="col-lg-6 col-md-6">
                        <div class="feature-card h-100" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="feature-icon">
                                <i class="{{ $feature['icon'] ?? 'fas fa-star' }}"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">{{ $feature['title'] ?? 'Feature Title' }}</h4>
                                <p class="feature-description">
                                    {{ $feature['description'] ?? 'Feature description goes here.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Default features if none provided -->
                <div class="col-lg-6 col-md-6">
                    <div class="feature-card h-100" data-aos="fade-up" data-aos-delay="0">
                        <div class="feature-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-title">Modern Design</h4>
                            <p class="feature-description">
                                Clean, contemporary design that looks great on all devices and screen sizes.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="feature-card h-100" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="fab fa-laravel"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-title">Laravel Powered</h4>
                            <p class="feature-description">
                                Built with the latest Laravel framework for reliability, security, and performance.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="feature-card h-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-title">Responsive Layout</h4>
                            <p class="feature-description">
                                Fully responsive design that works perfectly on mobile, tablet, and desktop devices.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="feature-card h-100" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="feature-content">
                            <h4 class="feature-title">Easy to Customize</h4>
                            <p class="feature-description">
                                Well-structured code and modular components make customization simple and efficient.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Additional Features Row -->
        <div class="row g-4 mt-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card-small text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-small">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 class="feature-title-small">Secure</h5>
                    <p class="feature-description-small">Built with security best practices</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card-small text-center" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-icon-small">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h5 class="feature-title-small">Fast</h5>
                    <p class="feature-description-small">Optimized for performance</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card-small text-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-icon-small">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="feature-title-small">Loved</h5>
                    <p class="feature-description-small">Built with care and attention</p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* Features Section Styles */
.features-section {
    position: relative;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 0;
}

/* Feature Cards */
.feature-card {
    background: white;
    border-radius: 1rem;
    padding: 2.5rem 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.feature-card:hover::before {
    transform: scaleX(1);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
}

.feature-icon i {
    font-size: 2rem;
    color: white;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1) rotate(5deg);
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.feature-description {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 0;
}

/* Small Feature Cards */
.feature-card-small {
    padding: 2rem 1.5rem;
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.feature-card-small:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

.feature-icon-small {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    transition: all 0.3s ease;
}

.feature-icon-small i {
    font-size: 1.5rem;
    color: white;
}

.feature-card-small:hover .feature-icon-small {
    transform: scale(1.1);
}

.feature-title-small {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.feature-description-small {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: 0;
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .section-title {
        font-size: 2rem;
    }
    
    .feature-card {
        padding: 2rem 1.5rem;
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
    }
    
    .feature-icon i {
        font-size: 1.75rem;
    }
}

@media (max-width: 767.98px) {
    .section-title {
        font-size: 1.75rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .feature-card {
        padding: 1.5rem;
        text-align: center;
    }
    
    .feature-icon {
        margin: 0 auto 1.5rem;
    }
    
    .feature-title {
        font-size: 1.25rem;
    }
    
    .feature-card-small {
        padding: 1.5rem 1rem;
    }
}
</style>
@endpush