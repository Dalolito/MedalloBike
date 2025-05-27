document.addEventListener('DOMContentLoaded', function() {
    
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href.length > 1) {
                const targetElement = document.querySelector(href);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    const headerOffset = 80;
                    const elementPosition = targetElement.offsetTop;
                    const offsetPosition = elementPosition - headerOffset;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    function updateCounters() {
        const counters = document.querySelectorAll('.stat-number[data-count]');
        
        counters.forEach(counter => {
            const target = counter.getAttribute('data-count');
            counter.textContent = target + '+';
        });
    }

    const statsSection = document.querySelector('.stats-section');
    let countersUpdated = false;
    
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !countersUpdated) {
                    updateCounters();
                    countersUpdated = true;
                    observer.disconnect(); // Ya no necesitamos observar más
                }
            });
        }, {
            threshold: 0.5
        });
        
        observer.observe(statsSection);
    }
    
    // Manejar el focus para navegación por teclado
    const focusableElements = document.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
    
    focusableElements.forEach(element => {
        element.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                if (this.tagName.toLowerCase() === 'a') {
                    // El comportamiento por defecto ya maneja los enlaces
                    return;
                }
                
                if (this.tagName.toLowerCase() === 'button') {
                    this.click();
                }
            }
        });
    });

    const images = document.querySelectorAll('img[data-src]');
    
    if (images.length > 0) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
    
    // Función para scroll suave programático (uso externo)
    window.scrollToSection = function(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            const headerOffset = 80;
            const elementPosition = element.offsetTop;
            const offsetPosition = elementPosition - headerOffset;
            
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    };
    
    // Precargar enlaces importantes al hacer hover
    const importantLinks = document.querySelectorAll('a[href^="/"]');
    
    importantLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            const linkElement = document.createElement('link');
            linkElement.rel = 'prefetch';
            linkElement.href = this.href;
            document.head.appendChild(linkElement);
        }, { once: true }); // Solo una vez por enlace
    });
    
    // Polyfill simple para IntersectionObserver si no está disponible
    if (!window.IntersectionObserver) {
        // Fallback simple: actualizar contadores inmediatamente
        updateCounters();
    }
    
    // Polyfill para smooth scroll si no está soportado
    if (!CSS.supports('scroll-behavior', 'smooth')) {
        // Reemplazar el comportamiento de scroll suave con una implementación básica
        smoothScrollLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.length > 1) {
                    const targetElement = document.querySelector(href);
                    if (targetElement) {
                        e.preventDefault();
                        targetElement.scrollIntoView();
                    }
                }
            });
        });
    }
    
    window.addEventListener('error', function(e) {
        // Log básico de errores (solo en desarrollo)
        if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
            console.error('Error en home page:', e.error);
        }
    });
    
    console.log('MedalloBike Home Page cargada correctamente');
});

window.MedalloBike = window.MedalloBike || {};

// Función para actualizar los contadores manualmente
window.MedalloBike.updateStats = function() {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    counters.forEach(counter => {
        const target = counter.getAttribute('data-count');
        counter.textContent = target + '+';
    });
};

// Función para resetear la página (útil para SPAs)
window.MedalloBike.reset = function() {
    // Resetear contadores
    const counters = document.querySelectorAll('.stat-number[data-count]');
    counters.forEach(counter => {
        counter.textContent = '0';
    });
    
    // Scroll al inicio
    window.scrollTo({ top: 0, behavior: 'smooth' });
};