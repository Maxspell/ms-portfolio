<?php
/**
 * AJAX Form Submission Handlers & Lead Processing.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

/**
 * Handle AJAX contact form submission with Nonce verification and Sanitization.
 */
function ms_portfolio_handle_contact_form(): void
{
    // 1. Verify Nonce for security
    check_ajax_referer('ms_portfolio_contact_nonce', 'nonce');

    // 2. Extract and sanitize input data
    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $contact = isset($_POST['contact']) ? sanitize_text_field(wp_unslash($_POST['contact'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    // 3. Validation
    if (empty($name) || empty($contact) || empty($message)) {
        wp_send_json_error([
            'message' => esc_html__('Будь ласка, заповніть усі обов\'язкові поля.', 'ms-portfolio'),
        ], 400);
    }

    $lead_data = [
        'name'    => $name,
        'contact' => $contact,
        'message' => $message,
    ];

    // 4. Send to Telegram
    $telegram_sent = ms_portfolio_send_telegram_lead($lead_data);

    // 5. Send Admin Email Notification (Fallback / Archive)
    $admin_email = get_option('admin_email');
    $subject     = sprintf(__('Нова заявка з портфоліо від %s', 'ms-portfolio'), $name);
    $headers     = ['Content-Type: text/html; charset=UTF-8'];
    $email_body  = sprintf(
        "<p><strong>Ім'я:</strong> %s</p><p><strong>Контакт:</strong> %s</p><p><strong>Повідомлення:</strong><br>%s</p>",
        esc_html($name),
        esc_html($contact),
        nl2br(esc_html($message))
    );

    wp_mail($admin_email, $subject, $email_body, $headers);

    if ($telegram_sent) {
        wp_send_json_success([
            'message' => esc_html__('Дякую! Вашу заявку успішно надіслано. Я зв\'яжуся з вами найближчим часом.', 'ms-portfolio'),
        ]);
    } else {
        wp_send_json_success([
            'message' => esc_html__('Заявка прийнята. Я зв\'яжуся з вами якнайшвидше.', 'ms-portfolio'),
        ]);
    }
}
add_action('wp_ajax_ms_portfolio_submit_contact', 'ms_portfolio_handle_contact_form');
add_action('wp_ajax_nopriv_ms_portfolio_submit_contact', 'ms_portfolio_handle_contact_form');
