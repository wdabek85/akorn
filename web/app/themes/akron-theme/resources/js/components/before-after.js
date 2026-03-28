export default function beforeAfter() {
  document.querySelectorAll('[data-before-after]').forEach((container) => {
    const clip = container.querySelector('[data-before-clip]');
    const slider = container.querySelector('[data-before-slider]');
    if (!clip || !slider) return;

    let isDragging = false;

    function updatePosition(x) {
      const rect = container.getBoundingClientRect();
      let percent = ((x - rect.left) / rect.width) * 100;
      percent = Math.max(0, Math.min(100, percent));

      clip.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
      slider.style.left = percent + '%';
    }

    // Mouse
    slider.addEventListener('mousedown', (e) => {
      isDragging = true;
      e.preventDefault();
    });

    document.addEventListener('mousemove', (e) => {
      if (!isDragging) return;
      updatePosition(e.clientX);
    });

    document.addEventListener('mouseup', () => {
      isDragging = false;
    });

    // Touch
    slider.addEventListener('touchstart', (e) => {
      isDragging = true;
    }, { passive: true });

    document.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      updatePosition(e.touches[0].clientX);
    }, { passive: true });

    document.addEventListener('touchend', () => {
      isDragging = false;
    });

    // Click anywhere on container to move slider
    container.addEventListener('click', (e) => {
      updatePosition(e.clientX);
    });
  });
}
