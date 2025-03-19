// Funcionalidad para el sidebar moderno al estilo Preline
document.addEventListener('DOMContentLoaded', function() {
  // Elementos principales
  const sidebar = document.getElementById('medallo-sidebar');
  const sidebarOverlay = document.querySelector('.sidebar-overlay');
  
  // Toggle del sidebar (mostrar/ocultar)
  const toggleButtons = document.querySelectorAll('[data-hs-overlay]');
  toggleButtons.forEach(button => {
      button.addEventListener('click', function() {
          const targetId = this.getAttribute('data-hs-overlay');
          const targetElement = document.querySelector(targetId);
          
          if (targetElement) {
              if (targetElement.classList.contains('-translate-x-full')) {
                  // Mostrar sidebar
                  targetElement.classList.remove('-translate-x-full');
                  targetElement.classList.add('translate-x-0');
                  document.body.classList.add('sidebar-overlay-open');
              } else {
                  // Ocultar sidebar
                  targetElement.classList.add('-translate-x-full');
                  targetElement.classList.remove('translate-x-0');
                  document.body.classList.remove('sidebar-overlay-open');
              }
          }
      });
  });
  
  // Cerrar sidebar al hacer clic en el overlay
  if (sidebarOverlay) {
      sidebarOverlay.addEventListener('click', function() {
          sidebar.classList.add('-translate-x-full');
          sidebar.classList.remove('translate-x-0');
          document.body.classList.remove('sidebar-overlay-open');
      });
  }
  
  // Funcionalidad de acordeón
  const accordionToggles = document.querySelectorAll('.hs-accordion-toggle');
  accordionToggles.forEach(toggle => {
      toggle.addEventListener('click', function() {
          const accordionId = this.getAttribute('aria-controls');
          const accordionContent = document.getElementById(accordionId);
          const isExpanded = this.getAttribute('aria-expanded') === 'true';
          
          // Cambiar aria-expanded
          this.setAttribute('aria-expanded', !isExpanded);
          
          // Alternar clase activa para el toggle
          if (isExpanded) {
              this.classList.remove('hs-accordion-active');
          } else {
              this.classList.add('hs-accordion-active');
          }
          
          // Mostrar/ocultar contenido
          if (accordionContent) {
              if (isExpanded) {
                  accordionContent.classList.add('hidden');
              } else {
                  accordionContent.classList.remove('hidden');
              }
          }
      });
  });
  
  // Cerrar sidebar en móvil al hacer clic en un enlace
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
  
  // Dropdown del footer (si existe)
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
      
      // Cerrar dropdown al hacer clic fuera
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