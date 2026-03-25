export function initMobileMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const closeEls = document.querySelectorAll('[data-menu-close]');
    const drawer = document.getElementById('mobile-menu');
    const overlay = document.getElementById('mobile-menu-overlay');
  
    if (!toggle || !drawer || !overlay) return;
  
    const open = () => {
      drawer.classList.remove('translate-x-full');
      overlay.classList.remove('hidden');
      toggle.setAttribute('aria-expanded', 'true');
      drawer.setAttribute('aria-hidden', 'false');
      document.documentElement.classList.add('overflow-hidden');
    };
  
    const close = () => {
      drawer.classList.add('translate-x-full');
      overlay.classList.add('hidden');
      toggle.setAttribute('aria-expanded', 'false');
      drawer.setAttribute('aria-hidden', 'true');
      document.documentElement.classList.remove('overflow-hidden');
    };
  
    toggle.addEventListener('click', open);
    closeEls.forEach(el => el.addEventListener('click', close));
    document.addEventListener('keydown', (e) => e.key === 'Escape' && close());

    // Mobile accordion (usługi submenu)
    drawer.querySelectorAll('[data-mobile-accordion]').forEach((item) => {
      const trigger = item.querySelector('[data-mobile-accordion-trigger]');
      const content = item.querySelector('[data-mobile-accordion-content]');
      const chevron = item.querySelector('[data-mobile-accordion-chevron]');

      if (!trigger || !content) return;

      trigger.addEventListener('click', () => {
        const isOpen = content.style.height !== '0px';

        if (isOpen) {
          content.style.height = '0';
          if (chevron) chevron.classList.remove('rotate-180');
        } else {
          content.style.height = content.scrollHeight + 'px';
          if (chevron) chevron.classList.add('rotate-180');
        }
      });
    });
  }
  