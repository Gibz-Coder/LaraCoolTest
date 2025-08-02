import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

/**
 * Header functionality for LaraCoolTest landing page
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Header scroll effect
    const header = document.getElementById('header');
    const scrollThreshold = 50;
    
    function handleScroll() {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);
    
    // Smooth scrolling for navigation links
    const smoothScrollLinks = document.querySelectorAll('.smooth-scroll');
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerHeight = header.offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }
                
                // Update active nav link
                updateActiveNavLink(targetId);
            }
        });
    });
    
    // Update active navigation link based on scroll position
    function updateActiveNavLink(activeId = null) {
        const sections = ['#hero', '#features', '#about', '#contact'];
        const navLinks = document.querySelectorAll('.smooth-scroll');
        
        if (activeId) {
            // Manually set active link
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === activeId) {
                    link.classList.add('active');
                }
            });
        } else {
            // Auto-detect based on scroll position
            let currentSection = '';
            const scrollPosition = window.scrollY + header.offsetHeight + 100;
            
            sections.forEach(sectionId => {
                const section = document.querySelector(sectionId);
                if (section && section.offsetTop <= scrollPosition) {
                    currentSection = sectionId;
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === currentSection) {
                    link.classList.add('active');
                }
            });
        }
    }
    
    // Update active nav link on scroll
    window.addEventListener('scroll', () => {
        updateActiveNavLink();
    });
    
    // Mobile menu toggle enhancement
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        navbarToggler.addEventListener('click', function() {
            // Add animation class
            navbarCollapse.classList.toggle('show-animation');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        const navbar = document.querySelector('.navbar');
        const isClickInsideNavbar = navbar.contains(e.target);
        
        if (!isClickInsideNavbar && navbarCollapse.classList.contains('show')) {
            const bsCollapse = new bootstrap.Collapse(navbarCollapse);
            bsCollapse.hide();
        }
    });
    
    // Initialize active nav link on page load
    updateActiveNavLink();
    
    // Back to top functionality
    const backToTopButton = document.getElementById('backToTop');
    
    if (backToTopButton) {
        // Show/hide back to top button based on scroll position
        function toggleBackToTop() {
            if (window.scrollY > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        }
        
        // Add scroll event listener for back to top button
        window.addEventListener('scroll', toggleBackToTop);
        
        // Back to top click handler
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Initialize back to top button visibility
        toggleBackToTop();
    }
    
    // Newsletter form handling
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[name="newsletter_email"]');
            const submitButton = this.querySelector('button[type="submit"]');
            
            if (emailInput.value.trim() === '') {
                alert('Please enter your email address.');
                return;
            }
            
            // Simulate newsletter signup
            const originalButtonContent = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            submitButton.disabled = true;
            
            setTimeout(() => {
                alert('Thank you for subscribing to our newsletter!');
                emailInput.value = '';
                submitButton.innerHTML = originalButtonContent;
                submitButton.disabled = false;
            }, 1500);
        });
    }
    
    // Add animation on scroll for footer elements
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe footer elements for animation
    const footerElements = document.querySelectorAll('.footer-brand, .footer-links, .footer-contact');
    footerElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(element);
    });
});
