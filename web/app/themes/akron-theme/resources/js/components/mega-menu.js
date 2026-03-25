export default function megaMenu() {
  const menu = document.querySelector('[data-mega-menu]');
  if (!menu) return;

  const trigger = menu.querySelector('[data-mega-trigger]');
  const dropdown = menu.querySelector('[data-mega-dropdown]');
  const chevron = menu.querySelector('[data-mega-chevron]');
  const previewImg = menu.querySelector('[data-mega-preview-img]');
  const previewDesc = menu.querySelector('[data-mega-preview-desc]');
  const items = menu.querySelectorAll('[data-mega-item]');
  const defaultDesc = 'Najedź na usługę, żeby zobaczyć szczegóły.';

  if (!dropdown || !trigger) return;

  let hideTimeout;

  function show() {
    clearTimeout(hideTimeout);
    dropdown.classList.remove('opacity-0', 'invisible');
    dropdown.classList.add('opacity-100', 'visible');
    if (chevron) chevron.classList.add('rotate-180');
  }

  function hide() {
    hideTimeout = setTimeout(() => {
      dropdown.classList.add('opacity-0', 'invisible');
      dropdown.classList.remove('opacity-100', 'visible');
      if (chevron) chevron.classList.remove('rotate-180');
      if (previewImg) {
        previewImg.style.opacity = '0';
        previewImg.src = '';
      }
      if (previewDesc) previewDesc.textContent = defaultDesc;
    }, 150);
  }

  // Trigger hover
  trigger.addEventListener('mouseenter', show);
  trigger.addEventListener('click', () => {
    const isVisible = dropdown.classList.contains('visible');
    if (isVisible) hide();
    else show();
  });

  // Keep open when hovering dropdown
  dropdown.addEventListener('mouseenter', () => clearTimeout(hideTimeout));
  dropdown.addEventListener('mouseleave', hide);

  // Hide when mouse leaves trigger (but not if going to dropdown)
  trigger.addEventListener('mouseleave', (e) => {
    // Small delay to allow mouse to reach dropdown
    hideTimeout = setTimeout(() => {
      if (!dropdown.matches(':hover')) {
        hide();
      }
    }, 100);
  });

  // Item hover → update preview
  items.forEach((item) => {
    item.addEventListener('mouseenter', () => {
      const img = item.dataset.megaImg;
      const desc = item.dataset.megaDesc;

      if (previewImg && img) {
        previewImg.src = img;
        previewImg.style.opacity = '1';
      }
      if (previewDesc && desc) {
        previewDesc.textContent = desc;
      }
    });
  });

  // Close on Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      dropdown.classList.add('opacity-0', 'invisible');
      dropdown.classList.remove('opacity-100', 'visible');
      if (chevron) chevron.classList.remove('rotate-180');
    }
  });
}
