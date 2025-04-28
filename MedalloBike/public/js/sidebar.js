document.addEventListener('DOMContentLoaded', function() {
    // Main elements
    const sidebar = document.getElementById('medallo-sidebar');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');
    
    // Sidebar toggle (show/hide)
    const toggleButtons = document.querySelectorAll('[data-hs-overlay]');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-hs-overlay');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                if (targetElement.classList.contains('-translate-x-full')) {
                    // Show sidebar
                    targetElement.classList.remove('-translate-x-full');
                    targetElement.classList.add('translate-x-0');
                    document.body.classList.add('sidebar-overlay-open');
                } else {
                    // Hide sidebar
                    targetElement.classList.add('-translate-x-full');
                    targetElement.classList.remove('translate-x-0');
                    document.body.classList.remove('sidebar-overlay-open');
                }
            }
        });
    });
    
    // Close sidebar when clicking on overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            sidebar.classList.remove('translate-x-0');
            document.body.classList.remove('sidebar-overlay-open');
        });
    }
    
    // Accordion functionality
    const accordionToggles = document.querySelectorAll('.hs-accordion-toggle');
    accordionToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const accordionId = this.getAttribute('aria-controls');
            const accordionContent = document.getElementById(accordionId);
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Change aria-expanded attribute
            this.setAttribute('aria-expanded', !isExpanded);
            
            // Toggle active class for the toggle
            if (isExpanded) {
                this.classList.remove('hs-accordion-active');
            } else {
                this.classList.add('hs-accordion-active');
            }
            
            // Show/hide content
            if (accordionContent) {
                if (isExpanded) {
                    accordionContent.classList.add('hidden');
                } else {
                    accordionContent.classList.remove('hidden');
                }
            }
        });
    });
    
    // Close sidebar on mobile when clicking a link
    const sidebarLinks = document.querySelectorAll('.sidebar-nav-link, .submenu-link');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                document.body.classList.remove('sidebar-overlay-open');
            }
        });
    });
    
    // Footer dropdown (if exists)
    const footerDropdownToggle = document.getElementById('footer-dropdown-toggle');
    const footerDropdownMenu = document.getElementById('footer-dropdown-menu');
    
    if (footerDropdownToggle && footerDropdownMenu) {
        footerDropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            this.setAttribute('aria-expanded', !isExpanded);
            
            if (isExpanded) {
                footerDropdownMenu.classList.add('hidden');
                footerDropdownMenu.classList.remove('opacity-100');
                footerDropdownMenu.classList.add('opacity-0');
            } else {
                footerDropdownMenu.classList.remove('hidden');
                setTimeout(() => {
                    footerDropdownMenu.classList.remove('opacity-0');
                    footerDropdownMenu.classList.add('opacity-100');
                }, 10);
            }
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!footerDropdownToggle.contains(event.target) && 
                !footerDropdownMenu.contains(event.target)) {
                footerDropdownToggle.setAttribute('aria-expanded', 'false');
                footerDropdownMenu.classList.add('hidden');
                footerDropdownMenu.classList.remove('opacity-100');
                footerDropdownMenu.classList.add('opacity-0');
            }
        });
    }
});