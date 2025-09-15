/**
 * Singer Building Theme JavaScript
 * Version: 1.0.0
 */

(function() {
    'use strict';
    
    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initSmoothScrolling();
        initContactForm();
        initAccessibility();
        initPerformanceOptimizations();
    });
    
    
    /**
     * Performance optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            }, {
                rootMargin: '50px'
            });
            
            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
        
        // Preload critical resources
        const preloadCriticalImages = () => {
            const heroImage = document.querySelector('.hero-background');
            if (heroImage) {
                const bgImage = heroImage.style.backgroundImage;
                if (bgImage) {
                    const url = bgImage.slice(4, -1).replace(/["']/g, '');
                    const link = document.createElement('link');
                    link.rel = 'preload';
                    link.as = 'image';
                    link.href = url;
                    document.head.appendChild(link);
                }
            }
        };
        
        preloadCriticalImages();
        
        // Debounce scroll events
        let scrollTimeout;
        const debouncedScroll = () => {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                // Additional scroll-based functionality can be added here
            }, 100);
        };
        
        window.addEventListener('scroll', debouncedScroll, { passive: true });
        
        // Optimize animations based on device capability
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        if (prefersReducedMotion.matches) {
            document.documentElement.style.setProperty('--transition-fast', '0ms');
            document.documentElement.style.setProperty('--transition-normal', '0ms');
        }
    }
    
    
    /**
     * Web Performance Monitoring
     */
    function initPerformanceMonitoring() {
        // Monitor Core Web Vitals
        if ('PerformanceObserver' in window) {
            // Largest Contentful Paint
            const lcpObserver = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                const lastEntry = entries[entries.length - 1];
                console.log('LCP:', lastEntry.startTime);
            });
            lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });
            
            // First Input Delay
            const fidObserver = new PerformanceObserver((list) => {
                const entries = list.getEntries();
                entries.forEach(entry => {
                    console.log('FID:', entry.processingStart - entry.startTime);
                });
            });
            fidObserver.observe({ entryTypes: ['first-input'] });
            
            // Cumulative Layout Shift
            let clsScore = 0;
            const clsObserver = new PerformanceObserver((list) => {
                list.getEntries().forEach(entry => {
                    if (!entry.hadRecentInput) {
                        clsScore += entry.value;
                    }
                });
                console.log('CLS:', clsScore);
            });
            clsObserver.observe({ entryTypes: ['layout-shift'] });
        }
    }
    
    // Initialize performance monitoring in development
    if (window.location.hostname === 'localhost' || window.location.hostname.includes('dev')) {
        initPerformanceMonitoring();
    }
});
