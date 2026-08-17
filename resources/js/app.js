import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS (Animate On Scroll)
function initAOS() {
    AOS.init({
        duration: 700,
        easing: 'ease-out-cubic',
        once: false,
        mirror: true,
        offset: 50,
        debounceDelay: 50,
        throttleDelay: 99
    });
}

// Attach globally so dynamic elements/tabs can trigger refresh
window.AOS = AOS;

// Run on load and DOM ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAOS);
} else {
    initAOS();
}
window.addEventListener('load', () => {
    AOS.refresh();
});

// Animated Number Counter on Scroll
document.addEventListener('DOMContentLoaded', () => {
    const counterElements = document.querySelectorAll('.counter[data-target]');
    if (counterElements.length > 0 && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-target'), 10);
                    const originalText = el.innerText.trim();
                    const prefix = originalText.match(/^[^\d]+/)?.[0] || '';
                    const suffix = originalText.match(/[^\d]+$/)?.[0] || '';
                    
                    if (!isNaN(target)) {
                        let start = 0;
                        const duration = 1800; // ms
                        const stepTime = 25; // ms
                        const totalSteps = duration / stepTime;
                        const increment = target / totalSteps;
                        
                        const timer = setInterval(() => {
                            start += increment;
                            if (start >= target) {
                                el.innerText = prefix + target + suffix;
                                clearInterval(timer);
                            } else {
                                el.innerText = prefix + Math.floor(start) + suffix;
                            }
                        }, stepTime);
                    }
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.2
        });

        counterElements.forEach(el => counterObserver.observe(el));
    }
});
