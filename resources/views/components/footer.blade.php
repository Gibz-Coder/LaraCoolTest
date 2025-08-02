<footer id="footer" class="footer-section">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row">
            <!-- Brand and Description -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand">
                    <h4 class="brand-name">
                        <i class="fas fa-rocket me-2"></i>
                        LaraCoolTest
                    </h4>
                    <p class="brand-description">
                        A modern, responsive Laravel landing page showcasing clean design, 
                        best practices, and powerful functionality. Built with love and attention to detail.
                    </p>
                    
                    <!-- Social Media Links -->
                    <div class="social-links">
                        <a href="#" class="social-link" target="_blank" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="social-link" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-links">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-menu">
                        <li><a href="#hero" class="smooth-scroll">Home</a></li>
                        <li><a href="#features" class="smooth-scroll">Features</a></li>
                        <li><a href="#about" class="smooth-scroll">About</a></li>
                        <li><a href="#contact" class="smooth-scroll">Contact</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Resources -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-links">
                    <h5 class="footer-title">Resources</h5>
                    <ul class="footer-menu">
                        <li><a href="#" target="_blank">Documentation</a></li>
                        <li><a href="#" target="_blank">GitHub Repository</a></li>
                        <li><a href="#" target="_blank">Laravel Docs</a></li>
                        <li><a href="#" target="_blank">Bootstrap Docs</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-contact">
                    <h5 class="footer-title">Contact Info</h5>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope me-3"></i>
                        <span>hello@laracooltest.com</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-phone me-3"></i>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt me-3"></i>
                        <span>123 Laravel Street, Framework City, FC 12345</span>
                    </div>
                    
                    <!-- Newsletter Signup -->
                    <div class="newsletter-signup mt-4">
                        <h6 class="newsletter-title">Stay Updated</h6>
                        <form class="newsletter-form" action="#" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" 
                                       class="form-control" 
                                       placeholder="Enter your email"
                                       name="newsletter_email"
                                       required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; {{ date('Y') }} LaraCoolTest. All rights reserved.</p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </div>
</footer>

@push('styles')
<style>
/* Footer Styles */
.footer-section {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
}

.footer-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
    z-index: 1;
}

.footer-section > .container {
    position: relative;
    z-index: 2;
}

/* Brand Section */
.footer-brand .brand-name {
    font-size: 1.75rem;
    font-weight: 700;
    color: white;
    margin-bottom: 1rem;
}

.footer-brand .brand-description {
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.social-link {
    width: 45px;
    height: 45px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.social-link:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    transform: translateY(-3px);
}

/* Footer Links */
.footer-links {
    margin-bottom: 2rem;
}

.footer-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: white;
    margin-bottom: 1.5rem;
    position: relative;
}

.footer-title::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 0;
    width: 30px;
    height: 2px;
    background: var(--secondary-color);
}

.footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu li {
    margin-bottom: 0.75rem;
}

.footer-menu li:last-child {
    margin-bottom: 0;
}

.footer-menu a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.footer-menu a:hover {
    color: white;
    padding-left: 0.5rem;
}

/* Footer Contact */
.footer-contact {
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.95rem;
}

.contact-item:last-child {
    margin-bottom: 0;
}

.contact-item i {
    color: var(--secondary-color);
    width: 20px;
}

/* Newsletter */
.newsletter-signup {
    margin-top: 2rem;
}

.newsletter-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    margin-bottom: 1rem;
}

.newsletter-form .form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: white;
    border-radius: 0.375rem 0 0 0.375rem;
}

.newsletter-form .form-control::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.newsletter-form .form-control:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--secondary-color);
    box-shadow: none;
    color: white;
}

.newsletter-form .btn {
    border-radius: 0 0.375rem 0.375rem 0;
    background: var(--secondary-color);
    border-color: var(--secondary-color);
}

.newsletter-form .btn:hover {
    background: #059669;
    border-color: #059669;
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem;
    margin-top: 3rem;
}

.copyright p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 0;
    font-size: 0.9rem;
}

.footer-bottom-links {
    text-align: right;
}

.footer-bottom-links a {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    font-size: 0.9rem;
    margin-left: 1.5rem;
    transition: color 0.3s ease;
}

.footer-bottom-links a:hover {
    color: white;
}

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
    z-index: 1000;
    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    background: var(--secondary-color);
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
}

.back-to-top i {
    font-size: 1.25rem;
}

/* Responsive Design */
@media (max-width: 991.98px) {
    .footer-section {
        padding: 3rem 0 2rem;
    }
    
    .footer-brand,
    .footer-links,
    .footer-contact {
        margin-bottom: 2.5rem;
        text-align: center;
    }
    
    .footer-title::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .social-links {
        justify-content: center;
    }
}

@media (max-width: 767.98px) {
    .footer-bottom-links {
        text-align: center;
        margin-top: 1rem;
    }
    
    .footer-bottom-links a {
        margin: 0 0.75rem;
        display: inline-block;
        margin-bottom: 0.5rem;
    }
    
    .back-to-top {
        bottom: 1rem;
        right: 1rem;
        width: 45px;
        height: 45px;
    }
    
    .back-to-top i {
        font-size: 1.1rem;
    }
}
</style>
@endpush