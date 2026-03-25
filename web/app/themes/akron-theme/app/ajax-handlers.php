<?php

namespace App;

/**
 * ─────────────────────────────────────────────
 *  CONTACT FORM HANDLER
 * ─────────────────────────────────────────────
 */
add_action('wp_ajax_akorn_contact', __NAMESPACE__ . '\\handle_contact_form');
add_action('wp_ajax_nopriv_akorn_contact', __NAMESPACE__ . '\\handle_contact_form');

function handle_contact_form(): void
{
    // 1. Verify nonce
    if (!isset($_POST['_nonce']) || !wp_verify_nonce($_POST['_nonce'], 'akorn_contact_nonce')) {
        wp_send_json_error(['message' => 'Nieprawidłowy token bezpieczeństwa. Odśwież stronę i spróbuj ponownie.'], 403);
    }

    // 2. Honeypot — if filled, it's a bot
    if (!empty($_POST['website_url'])) {
        // Pretend success so the bot doesn't retry
        wp_send_json_success(['message' => 'Wiadomość wysłana.']);
    }

    // 3. Rate limiting — max 5 per hour per IP
    $ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? 'unknown');
    $transient_key = 'akorn_contact_' . md5($ip);
    $attempts = (int) get_transient($transient_key);

    if ($attempts >= 5) {
        wp_send_json_error(['message' => 'Zbyt wiele wiadomości. Spróbuj ponownie za godzinę.'], 429);
    }

    // 4. Sanitize inputs
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // 5. Validate
    $errors = [];
    if (empty($name) || mb_strlen($name) < 2) {
        $errors[] = 'Podaj swoje imię (min. 2 znaki).';
    }
    if (!is_email($email)) {
        $errors[] = 'Podaj poprawny adres e-mail.';
    }
    if (empty($message) || mb_strlen($message) < 10) {
        $errors[] = 'Wiadomość musi mieć min. 10 znaków.';
    }
    if (mb_strlen($message) > 5000) {
        $errors[] = 'Wiadomość jest za długa (max 5000 znaków).';
    }

    if (!empty($errors)) {
        wp_send_json_error(['message' => implode(' ', $errors)], 422);
    }

    // 6. Send email
    $to = get_option('admin_email');
    $subject = sprintf('[Akorn] Nowa wiadomość od %s', $name);
    $body = sprintf(
        "Imię: %s\nE-mail: %s\n\nWiadomość:\n%s\n\n---\nIP: %s\nStrona: %s",
        $name,
        $email,
        $message,
        $ip,
        home_url()
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ];

    $sent = wp_mail($to, $subject, $body, $headers);

    if (!$sent) {
        wp_send_json_error(['message' => 'Nie udało się wysłać wiadomości. Spróbuj ponownie później.'], 500);
    }

    // 7. Increment rate limit
    set_transient($transient_key, $attempts + 1, HOUR_IN_SECONDS);

    wp_send_json_success(['message' => 'Dziękujemy! Twoja wiadomość została wysłana. Odpowiemy najszybciej jak to możliwe.']);
}

/**
 * ─────────────────────────────────────────────
 *  NEWSLETTER FORM HANDLER
 * ─────────────────────────────────────────────
 */
add_action('wp_ajax_akorn_newsletter', __NAMESPACE__ . '\\handle_newsletter_form');
add_action('wp_ajax_nopriv_akorn_newsletter', __NAMESPACE__ . '\\handle_newsletter_form');

function handle_newsletter_form(): void
{
    // 1. Verify nonce
    if (!isset($_POST['_nonce']) || !wp_verify_nonce($_POST['_nonce'], 'akorn_newsletter_nonce')) {
        wp_send_json_error(['message' => 'Nieprawidłowy token bezpieczeństwa. Odśwież stronę i spróbuj ponownie.'], 403);
    }

    // 2. Honeypot
    if (!empty($_POST['website_url'])) {
        wp_send_json_success(['message' => 'Zapisano do newslettera.']);
    }

    // 3. Rate limiting — max 3 per hour per IP
    $ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? 'unknown');
    $transient_key = 'akorn_newsletter_' . md5($ip);
    $attempts = (int) get_transient($transient_key);

    if ($attempts >= 3) {
        wp_send_json_error(['message' => 'Zbyt wiele prób. Spróbuj ponownie za godzinę.'], 429);
    }

    // 4. Sanitize & validate
    $email = sanitize_email($_POST['email'] ?? '');

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Podaj poprawny adres e-mail.'], 422);
    }

    // 5. Send notification to admin
    $to = get_option('admin_email');
    $subject = '[Akorn] Nowy zapis do newslettera';
    $body = sprintf(
        "Nowy adres e-mail do newslettera:\n%s\n\n---\nIP: %s\nStrona: %s",
        $email,
        $ip,
        home_url()
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s', $email),
    ];

    wp_mail($to, $subject, $body, $headers);

    // 6. Increment rate limit
    set_transient($transient_key, $attempts + 1, HOUR_IN_SECONDS);

    wp_send_json_success(['message' => 'Dziękujemy! Zostałeś zapisany do newslettera.']);
}

/**
 * ─────────────────────────────────────────────
 *  ENQUEUE AJAX URL for frontend
 * ─────────────────────────────────────────────
 */
add_action('wp_enqueue_scripts', function () {
    // Localize after the main app script
    add_action('wp_footer', function () {
        printf(
            '<script>window.akornAjax = %s;</script>',
            wp_json_encode([
                'url' => admin_url('admin-ajax.php'),
                'contactNonce' => wp_create_nonce('akorn_contact_nonce'),
                'newsletterNonce' => wp_create_nonce('akorn_newsletter_nonce'),
            ])
        );
    }, 5);
});
