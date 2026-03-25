export default function accordion() {
  document.querySelectorAll('[data-accordion]').forEach((accordion) => {
    accordion.querySelectorAll('[data-accordion-trigger]').forEach((trigger) => {
      trigger.addEventListener('click', () => {
        const item = trigger.closest('[data-accordion-item]');
        const content = item.querySelector('[data-accordion-content]');
        const isOpen = item.hasAttribute('data-accordion-open');

        // Close all items in this accordion
        accordion.querySelectorAll('[data-accordion-item]').forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem.removeAttribute('data-accordion-open');
            const otherContent = otherItem.querySelector('[data-accordion-content]');
            const otherTrigger = otherItem.querySelector('[data-accordion-trigger]');
            if (otherContent) otherContent.style.height = '0';
            if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
          }
        });

        // Toggle current item
        if (isOpen) {
          item.removeAttribute('data-accordion-open');
          content.style.height = '0';
          trigger.setAttribute('aria-expanded', 'false');
        } else {
          item.setAttribute('data-accordion-open', '');
          content.style.height = content.scrollHeight + 'px';
          trigger.setAttribute('aria-expanded', 'true');
        }
      });
    });

    // Set initial height for open items
    accordion.querySelectorAll('[data-accordion-open] [data-accordion-content]').forEach((content) => {
      content.style.height = content.scrollHeight + 'px';
    });
  });
}
