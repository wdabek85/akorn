export default function forms() {
  initContactForm();
  initNewsletterForm();
}

function initContactForm() {
  const form = document.querySelector('[data-kontakt-form]');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const btn = form.querySelector('[data-submit]');
    const feedback = form.querySelector('[data-feedback]');
    if (!btn || !window.akornAjax) return;

    // Disable button
    const originalText = btn.textContent;
    btn.textContent = 'Wysyłanie...';
    btn.disabled = true;
    if (feedback) feedback.classList.add('hidden');

    const formData = new FormData(form);
    formData.append('action', 'akorn_contact');
    formData.append('_nonce', window.akornAjax.contactNonce);

    try {
      const res = await fetch(window.akornAjax.url, {
        method: 'POST',
        body: formData,
      });

      const json = await res.json();

      if (feedback) {
        feedback.textContent = json.data?.message || 'Coś poszło nie tak.';
        feedback.classList.remove('hidden', 'text-green-600', 'text-red-500');
        feedback.classList.add(json.success ? 'text-green-600' : 'text-red-500');
      }

      if (json.success) {
        form.reset();
      }
    } catch {
      if (feedback) {
        feedback.textContent = 'Błąd połączenia. Spróbuj ponownie.';
        feedback.classList.remove('hidden', 'text-green-600');
        feedback.classList.add('text-red-500');
      }
    } finally {
      btn.textContent = originalText;
      btn.disabled = false;
    }
  });
}

function initNewsletterForm() {
  document.querySelectorAll('[data-newsletter-form]').forEach((form) => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      const btn = form.querySelector('[data-submit]');
      const feedback = form.querySelector('[data-feedback]');
      if (!btn || !window.akornAjax) return;

      const originalText = btn.textContent;
      btn.textContent = 'Zapisywanie...';
      btn.disabled = true;
      if (feedback) feedback.classList.add('hidden');

      const formData = new FormData(form);
      formData.append('action', 'akorn_newsletter');
      formData.append('_nonce', window.akornAjax.newsletterNonce);

      try {
        const res = await fetch(window.akornAjax.url, {
          method: 'POST',
          body: formData,
        });

        const json = await res.json();

        if (feedback) {
          feedback.textContent = json.data?.message || 'Coś poszło nie tak.';
          feedback.classList.remove('hidden', 'text-green-600', 'text-red-500');
          feedback.classList.add(json.success ? 'text-green-600' : 'text-red-500');
        }

        if (json.success) {
          form.reset();
        }
      } catch {
        if (feedback) {
          feedback.textContent = 'Błąd połączenia. Spróbuj ponownie.';
          feedback.classList.remove('hidden', 'text-green-600');
          feedback.classList.add('text-red-500');
        }
      } finally {
        btn.textContent = originalText;
        btn.disabled = false;
      }
    });
  });
}
