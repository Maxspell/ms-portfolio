<?php
/**
 * Polylang Multilingual Strings Registration & Helpers.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

/**
 * Register theme strings with Polylang for translation.
 */
function ms_portfolio_register_polylang_strings(): void
{
    if (!function_exists('pll_register_string')) {
        return;
    }

    $strings = [
        'Hero Title'           => 'Розробка швидких та керованих сайтів для бізнесу на WordPress & PHP під ключ.',
        'Hero Subtitle'        => 'Без важких конструкторів. Чистий оптимізований код, сучасний дизайн та інтуїтивна панель керування.',
        'Hero CTA Discuss'     => 'Обговорити проєкт',
        'Hero CTA Telegram'    => 'Написати в Telegram',
        'Hero CTA Cases'       => 'Переглянути кейси',
        'Trust Speed Score'    => 'Google PageSpeed score (Mobile & Desktop)',
        'Trust Speed Sub'      => 'Миттєве завантаження без зайвого DOM',
        'Trust Deadline'       => 'Дотримання термінів за договором',
        'Trust Builders'       => 'Конструкторів (Zero Bloatware)',
        'Trust Guarantee'      => 'Гарантійна підтримка та супровід коду',
        'Status Available'     => 'Доступний для нових проєктів',
        'Contact Form Name'    => 'Ваше ім\'я',
        'Contact Form Contact' => 'Telegram або телефон',
        'Contact Form Message' => 'Коротко про ваш проєкт чи завдання',
        'Contact Form Submit'  => 'Надіслати запит',
    ];

    foreach ($strings as $name => $string) {
        pll_register_string('ms-portfolio', $string, 'Theme ' . $name);
    }
}
add_action('after_setup_theme', 'ms_portfolio_register_polylang_strings');

/**
 * Safe string translator helper for Polylang fallback.
 */
function ms_pll__(string $string): string
{
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return __($string, 'ms-portfolio');
}

/**
 * Safe echo string translator helper for Polylang fallback.
 */
function ms_pll_e(string $string): void
{
    echo esc_html(ms_pll__($string));
}
