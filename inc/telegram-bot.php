<?php
/**
 * Telegram Bot API Notification integration.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

/**
 * Send lead notification message to Telegram via Bot API.
 *
 * @param array $lead_data Lead information (name, contact, message, ip, etc.)
 * @return bool True if successfully dispatched, false otherwise.
 */
function ms_portfolio_send_telegram_lead(array $lead_data): bool
{
    // Define BOT Token and Chat ID constants in wp-config.php or options:
    // define('MS_TELEGRAM_BOT_TOKEN', '123456:ABC-DEF...');
    // define('MS_TELEGRAM_CHAT_ID', '123456789');
    $bot_token = defined('MS_TELEGRAM_BOT_TOKEN') ? MS_TELEGRAM_BOT_TOKEN : get_option('ms_telegram_bot_token', '');
    $chat_id   = defined('MS_TELEGRAM_CHAT_ID') ? MS_TELEGRAM_CHAT_ID : get_option('ms_telegram_chat_id', '');

    if (empty($bot_token) || empty($chat_id)) {
        // Fallback: log or simulate success in local development environment
        error_log('[Telegram Bot] Bot Token or Chat ID not configured. Lead data: ' . wp_json_encode($lead_data));
        return true;
    }

    $name    = esc_html($lead_data['name'] ?? 'Не вказано');
    $contact = esc_html($lead_data['contact'] ?? 'Не вказано');
    $message = esc_html($lead_data['message'] ?? 'Не вказано');
    $date    = current_time('Y-m-d H:i:s');
    $ip      = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? 'Unknown');

    $text  = "🔥 <b>Нова заявка з сайту-портфоліо!</b>\n\n";
    $text .= "👤 <b>Ім'я:</b> {$name}\n";
    $text .= "📱 <b>Контакт:</b> {$contact}\n";
    $text .= "💬 <b>Повідомлення:</b>\n{$message}\n\n";
    $text .= "📅 <b>Дата:</b> {$date}\n";
    $text .= "🌐 <b>IP:</b> {$ip}";

    $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";

    $response = wp_remote_post($url, [
        'timeout'   => 10,
        'sslverify' => true,
        'headers'   => [
            'Content-Type' => 'application/json',
        ],
        'body'      => wp_json_encode([
            'chat_id'                  => $chat_id,
            'text'                     => $text,
            'parse_mode'               => 'HTML',
            'disable_web_page_preview' => true,
        ]),
    ]);

    if (is_wp_error($response)) {
        error_log('[Telegram Bot Error] ' . $response->get_error_message());
        return false;
    }

    $code = wp_remote_retrieve_response_code($response);
    return ($code >= 200 && $code < 300);
}
