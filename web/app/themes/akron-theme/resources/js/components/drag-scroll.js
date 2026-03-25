export default function dragScroll() {
  document.querySelectorAll('[data-opinie-slider]').forEach((slider) => {
    let isDown = false;
    let hasMoved = false;
    let startX;
    let scrollStart;

    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      hasMoved = false;
      startX = e.pageX;
      scrollStart = slider.scrollLeft;
      slider.style.scrollSnapType = 'none';
      slider.style.scrollBehavior = 'auto';
    });

    const stopDrag = () => {
      if (!isDown) return;
      isDown = false;
      // Re-enable snap after drag ends
      slider.style.scrollSnapType = '';
      slider.style.scrollBehavior = '';
    };

    document.addEventListener('mouseup', stopDrag);
    slider.addEventListener('mouseleave', stopDrag);

    slider.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const diff = e.pageX - startX;
      if (Math.abs(diff) > 3) hasMoved = true;
      slider.scrollLeft = scrollStart - diff;
    });

    // Block clicks after a real drag
    slider.addEventListener('click', (e) => {
      if (hasMoved) {
        e.preventDefault();
        e.stopPropagation();
      }
    }, true);
  });
}
