export default function portfolio() {
  document.querySelectorAll('[data-portfolio-list]').forEach((list) => {
    const items = list.querySelectorAll('[data-portfolio-item]');

    // Set initial state for icons/colors
    items.forEach((item) => {
      updateItemState(item);
    });

    list.querySelectorAll('[data-portfolio-trigger]').forEach((trigger) => {
      trigger.addEventListener('click', () => {
        const item = trigger.closest('[data-portfolio-item]');
        const isOpen = item.hasAttribute('data-portfolio-open');

        // Close all
        items.forEach((otherItem) => {
          if (otherItem !== item) {
            closeItem(otherItem);
          }
        });

        // Toggle current
        if (isOpen) {
          closeItem(item);
        } else {
          openItem(item);
        }
      });
    });
  });
}

function openItem(item) {
  item.setAttribute('data-portfolio-open', '');

  // Desktop image
  const img = item.querySelector('[data-portfolio-image]');
  if (img) {
    img.style.width = '440px';
    img.style.height = '250px';
    img.style.opacity = '1';
  }

  // Mobile image
  const imgMobile = item.querySelector('[data-portfolio-image-mobile]');
  if (imgMobile) {
    imgMobile.style.height = '200px';
    imgMobile.style.opacity = '1';
  }

  updateItemState(item);
}

function closeItem(item) {
  item.removeAttribute('data-portfolio-open');

  // Desktop image
  const img = item.querySelector('[data-portfolio-image]');
  if (img) {
    img.style.width = '0';
    img.style.height = '0';
    img.style.opacity = '0';
  }

  // Mobile image
  const imgMobile = item.querySelector('[data-portfolio-image-mobile]');
  if (imgMobile) {
    imgMobile.style.height = '0';
    imgMobile.style.opacity = '0';
  }

  updateItemState(item);
}

function updateItemState(item) {
  const isOpen = item.hasAttribute('data-portfolio-open');

  item.querySelectorAll('[data-portfolio-trigger]').forEach((trigger) => {
    const iconMinus = trigger.querySelector('[data-icon-minus]');
    const iconPlus = trigger.querySelector('[data-icon-plus]');

    if (isOpen) {
      trigger.classList.remove('bg-blue-300', 'text-white');
      trigger.classList.add('bg-white', 'text-black');
      if (iconMinus) iconMinus.classList.remove('hidden');
      if (iconPlus) iconPlus.classList.add('hidden');
    } else {
      trigger.classList.remove('bg-white', 'text-black');
      trigger.classList.add('bg-blue-300', 'text-white');
      if (iconMinus) iconMinus.classList.add('hidden');
      if (iconPlus) iconPlus.classList.remove('hidden');
    }
  });
}
