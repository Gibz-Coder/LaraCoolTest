<!-- Newsletter Signup Section -->
<section id="newsletter" class="newsletter-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="newsletter-content fade-in-up">
                    <h2 class="h3 mb-3">
                        <i class="fas fa-envelope me-2"></i>
                        Stay Updated
                    </h2>
                    <p class="lead mb-4">
                        Subscribe to our newsletter and be the first to know about new features, updates, and exclusive content.
                    </p>
                    
                    <!-- Newsletter Form -->
                    <form id="newsletter-form" class="newsletter-form">
                        @csrf
                        <div class="row g-3 justify-content-center">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" 
                                           class="form-control" 
                                           id="newsletter-name" 
                                           name="name" 
                                           placeholder="Your Name (Optional)">
                                    <label for="newsletter-name">Your Name (Optional)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" 
                                           class="form-control" 
                                           id="newsletter-email" 
                                           name="email" 
                                           placeholder="Your Email Address" 
                                           required>
                                    <label for="newsletter-email">Your Email Address *</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-light btn-lg px-4">
                                    <span class="btn-text">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Subscribe Now
                                    </span>
                                    <span class="btn-loading d-none">
                                        <i class="fas fa-spinner fa-spin me-2"></i>
                                        Subscribing...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Success/Error Messages -->
                    <div id="newsletter-message" class="mt-3"></div>
                    
                    <p class="small mt-3 opacity-75">
                        <i class="fas fa-shield-alt me-1"></i>
                        We respect your privacy. Unsubscribe at any time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.newsletter-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    position: relative;
    overflow: hidden;
}

.newsletter-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}

.newsletter-content {
    position: relative;
    z-index: 1;
}

.newsletter-form .form-control {
    background: rgba(255, 255, 255, 0.95);
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.newsletter-form .form-control:focus {
    background: white;
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
}

.newsletter-form .form-floating > label {
    color: #6c757d;
}

.newsletter-form .btn-light {
    background: white;
    border: 2px solid white;
    color: var(--primary-color);
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.newsletter-form .btn-light:hover {
    background: transparent;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.newsletter-form .btn-light:active {
    transform: translateY(0);
}

/* Loading state */
.newsletter-form .btn-light:disabled {
    opacity: 0.8;
    cursor: not-allowed;
    transform: none;
}

/* Message styles */
.alert-success {
    background: rgba(16, 185, 129, 0.2);
    border: 1px solid rgba(16, 185, 129, 0.3);
    color: #065f46;
}

.alert-danger {
    background: rgba(239, 68, 68, 0.2);
    border: 1px solid rgba(239, 68, 68, 0.3);
    color: #991b1b;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .newsletter-section {
        padding: 3rem 0;
    }
    
    .newsletter-form .col-md-6 {
        margin-bottom: 1rem;
    }
    
    .newsletter-form .btn-lg {
        width: 100%;
    }
}

/* Animation for form submission */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.newsletter-form.submitting .btn {
    animation: pulse 1s infinite;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.getElementById('newsletter-form');
    const messageDiv = document.getElementById('newsletter-message');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            // Show loading state
            submitBtn.disabled = true;
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            this.classList.add('submitting');
            
            try {
                const response = await fetch('{{ route("newsletter.subscribe") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Show success message
                    messageDiv.innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
                    
                    // Reset form
                    this.reset();
                    
                    // Track successful subscription (if analytics is available)
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'newsletter_subscribe', {
                            'event_category': 'engagement',
                            'event_label': 'newsletter'
                        });
                    }
                    
                } else {
                    // Show error message
                    messageDiv.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;
                }
                
            } catch (error) {
                console.error('Newsletter subscription error:', error);
                messageDiv.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Sorry, there was an issue with your subscription. Please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
            } finally {
                // Reset button state
                submitBtn.disabled = false;
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                this.classList.remove('submitting');
            }
        });
    }
});
</script>
@endpush