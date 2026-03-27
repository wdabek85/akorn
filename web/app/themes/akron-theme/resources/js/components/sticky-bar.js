export default function stickyBar() {
  const barDesktop = document.querySelector('[data-sticky-bar]');
  const barMobile = document.querySelector('[data-sticky-bar-mobile]');
  if (!barDesktop && !barMobile) return;

  const hero = document.querySelector('[data-page-hero]') || document.querySelector('[data-hero]');
  if (!hero) return;

  // Dynamically measure navbar height and set top position
  const navbar = document.querySelector('[data-mega-menu]');
  if (navbar && barDesktop) {
    const updateTop = () => {
      barDesktop.style.top = navbar.offsetHeight + 'px';
    };
    updateTop();
    window.addEventListener('resize', updateTop);
  }

  const observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) {
        // Hero visible — hide bars
        if (barDesktop) {
          barDesktop.classList.add('-translate-y-full', 'opacity-0');
          barDesktop.classList.remove('translate-y-0', 'opacity-100');
        }
        if (barMobile) {
          barMobile.classList.add('translate-y-full', 'opacity-0');
          barMobile.classList.remove('translate-y-0', 'opacity-100');
        }
      } else {
        // Hero scrolled past — show bars
        if (barDesktop) {
          barDesktop.classList.remove('-translate-y-full', 'opacity-0');
          barDesktop.classList.add('lg:block', 'translate-y-0', 'opacity-100');
        }
        if (barMobile) {
          barMobile.classList.remove('translate-y-full', 'opacity-0');
          barMobile.classList.add('translate-y-0', 'opacity-100');
        }
      }
    },
    { threshold: 0 }
  );

  observer.observe(hero);
}
