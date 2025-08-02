<section id="contact" class="contact-section section bg-light">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Get In Touch</h2>
                <p class="section-subtitle">
                    Have a question or want to work together? We'd love to hear from you. 
                    Send us a message and we'll respond as soon as possible.
                </p>
            </div>
        </div>
        
        <div class="row mt-5">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form-container" data-aos="fade-right">
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Contact Form -->
                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form" id="contactForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           placeholder="Enter your full name"
                                           required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="Enter your email address"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="subject" 
                                   name="subject" 
                                   value="{{ old('subject') }}"
                                   placeholder="What's this about?">
                        </div>
                        
                        <div class="form-group mb-4">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" 
                                      name="message" 
                                      rows="6" 
                                      placeholder="Tell us more about your project or inquiry..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info" data-aos="fade-left">
                    <div class="contact-info-card">
                        <h4 class="contact-info-title">Contact Information</h4>
                        <p class="contact-info-subtitle">
                            Reach out to us through any of these channels
                        </p>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Email</h6>
                                <p>hello@laracooltest.com</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Phone</h6>
                                <p>+1 (555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h6>Address</h6>
                                <p>123 Laravel Street<br>Framework City, FC 12345</p>
                            </div>
                        </div>
                        
                        <!-- Social Media Links -->
                        <div class="social-links mt-4">
                            <h6 class="social-title">Follow Us</h6>
                            <div class="social-icons">
                                <a href="#" class="social-link" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link" target="_blank">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
/* Contact Section Styles */
.contact-section {
    position: relative;
}

/* Contact Form */
.contact-form-container {
    background: white;
    border-radius: 1rem;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.contact-form .form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.contact-form .form-control {
    border: 2px solid #e9ecef;
    border-radius: 0.5rem;
    padding: 0.875rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.contact-form .form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
    background-color: white;
}

.contact-form .form-control.is-invalid {
    border-color: var(--error-color);
}

.contact-form .form-control.is-invalid:focus {
    border-color: var(--error-color);
    box-shadow: 0 0 0 0.2rem rgba(239, 68, 68, 0.25);
}

.contact-form textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.contact-form .btn-primary {
    padding: 1rem 3rem;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.contact-form .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(59, 130, 246, 0.3);
}

/* Contact Information */
.contact-info {
    padding: 2rem 0;
}

.contact-info-card {
    background: white;
    border-radius: 1rem;
    padding: 2.5rem 2rem;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    height: 100%;
}

.contact-info-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.contact-info-subtitle {
    color: var(--text-light);
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
}

.contact-item:last-child {
    margin-bottom: 0;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-icon i {
    font-size: 1.25rem;
    color: white;
}

.contact-details h6 {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.contact-details p {
    color: var(--text-light);
    margin-bottom: 0;
    font-size: 0.95rem;
}

/* Social Links */
.social-links {
    border-top: 1px solid var(--border-color);
    padding-top: 1.5rem;
}

.social-title {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.social-icons {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 45px;
    height: 45px;
    background: var(--bg-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-light);
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-3px);
}

/* Alert Styles */
.alert-success {
    border: none;
    border-radius: 0.5rem;
    background-color: rgba(16, 185, 129, 0.1);
    color: #059669;
    border-left: 4px solid var(--success-color);
}

/* Form Validation */
.invalid-feedback {
    display: block;
    font-size: 0.875rem;
    color: var(--error-color);
    margin-top: 0.25rem;
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .contact-form-container {
        padding: 2rem;
        margin-bottom: 2rem;
    }
    
    .contact-info-card {
        padding: 2rem 1.5rem;
    }
}

@media (max-width: 767.98px) {
    .contact-form-container {
        padding: 1.5rem;
    }
    
    .contact-form .btn-primary {
        padding: 0.875rem 2rem;
        width: 100%;
    }
    
    .contact-info-card {
        padding: 1.5rem;
    }
    
    .contact-item {
        margin-bottom: 1.5rem;
    }
    
    .social-icons {
        justify-content: center;
    }
}
</style>
@endpush