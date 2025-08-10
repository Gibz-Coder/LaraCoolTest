<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <div class="section-header fade-in-up">
                    <h2 class="display-5 fw-bold text-dark mb-3">
                        What Our Users Say
                    </h2>
                    <p class="lead text-muted">
                        Don't just take our word for it - hear from some of our satisfied users
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach($testimonials ?? [] as $index => $testimonial)
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card fade-in-up" style="animation-delay: {{ $index * 0.2 }}s">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <!-- Rating Stars -->
                            <div class="rating mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($testimonial['rating'] ?? 5) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                            </div>
                            
                            <!-- Testimonial Text -->
                            <blockquote class="blockquote mb-4">
                                <p class="mb-0 text-dark">
                                    "{{ $testimonial['text'] ?? 'Great experience with this platform!' }}"
                                </p>
                            </blockquote>
                            
                            <!-- Author Info -->
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                    @if(isset($testimonial['avatar']))
                                        <img src="{{ $testimonial['avatar'] }}" 
                                             alt="{{ $testimonial['name'] ?? 'User' }}" 
                                             class="rounded-circle" 
                                             width="50" 
                                             height="50">
                                    @else
                                        <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $testimonial['name'] ?? 'Anonymous User' }}</h6>
                                    <small class="text-muted">{{ $testimonial['position'] ?? 'Verified User' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Call to Action -->
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <div class="cta-content fade-in-up">
                    <h3 class="h4 mb-3">Ready to Join Them?</h3>
                    <p class="text-muted mb-4">Start your journey with us today and see why our users love what we do.</p>
                    <a href="#contact" class="btn btn-primary btn-lg px-4 smooth-scroll">
                        <i class="fas fa-rocket me-2"></i>
                        Get Started Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.testimonials-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
}

.testimonial-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
}

.testimonial-card .card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.testimonial-card:hover .card {
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
}

.rating .fa-star {
    font-size: 0.9rem;
    margin-right: 2px;
}

.blockquote {
    font-style: italic;
    position: relative;
}

.blockquote::before {
    content: '"';
    font-size: 4rem;
    color: var(--primary-color);
    position: absolute;
    top: -20px;
    left: -10px;
    opacity: 0.3;
    font-family: Georgia, serif;
}

.avatar-placeholder {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}

.avatar img {
    object-fit: cover;
}

/* Animation delays for staggered effect */
.fade-in-up:nth-child(1) { animation-delay: 0s; }
.fade-in-up:nth-child(2) { animation-delay: 0.2s; }
.fade-in-up:nth-child(3) { animation-delay: 0.4s; }

/* Responsive adjustments */
@media (max-width: 768px) {
    .testimonials-section {
        padding: 3rem 0;
    }
    
    .blockquote::before {
        font-size: 3rem;
        top: -15px;
        left: -5px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .testimonials-section {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    }
    
    .testimonial-card .card {
        background: #2d2d2d;
        color: white;
    }
    
    .text-dark {
        color: white !important;
    }
}
</style>
@endpush