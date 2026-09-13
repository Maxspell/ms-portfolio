<?php
/**
 * Enqueue scripts and styles.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

if (!function_exists('ms_portfolio_scripts')) {
    /**
     * Enqueue CSS, JS and localized data.
     */
    function ms_portfolio_scripts(): void
    {
        $theme_version = wp_get_theme()->get('Version') ?: '1.0.0';
        $assets_uri    = get_template_directory_uri() . '/assets';

        // Google Fonts (Inter + JetBrains Mono) with preconnect
        wp_enqueue_style(
            'ms-portfolio-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap',
            [],
            null
        );

        // Design Tokens
        wp_enqueue_style(
            'ms-portfolio-variables',
            $assets_uri . '/css/variables.css',
            [],
            $theme_version
        );

        // Core / Layout CSS
        wp_enqueue_style(
            'ms-portfolio-main',
            $assets_uri . '/css/main.css',
            ['ms-portfolio-variables'],
            $theme_version
        );

        // BEM Components CSS
        wp_enqueue_style(
            'ms-portfolio-components',
            $assets_uri . '/css/components.css',
            ['ms-portfolio-variables', 'ms-portfolio-main'],
            $theme_version
        );

        // Micro-animations CSS
        wp_enqueue_style(
            'ms-portfolio-animations',
            $assets_uri . '/css/animations.css',
            ['ms-portfolio-components'],
            $theme_version
        );

        // Theme Main Style (WordPress standard)
        wp_enqueue_style(
            'ms-portfolio-style',
            get_stylesheet_uri(),
            ['ms-portfolio-animations'],
            $theme_version
        );

        // Main Vanilla JS (Navigation, accordions, scroll effects)
        wp_enqueue_script(
            'ms-portfolio-main-js',
            $assets_uri . '/js/main.js',
            [],
            $theme_version,
            true
        );

        // AJAX Form Submission Handler
        wp_enqueue_script(
            'ms-portfolio-ajax-form',
            $assets_uri . '/js/ajax-form.js',
            ['ms-portfolio-main-js'],
            $theme_version,
            true
        );

        // Localized parameters for AJAX and client scripts
        wp_localize_script('ms-portfolio-ajax-form', 'msPortfolioData', [
            'ajaxUrl'    => admin_url('admin-ajax.php'),
            'nonce'      => wp_create_nonce('ms_portfolio_contact_nonce'),
            'i18n'       => [
                'sending'      => esc_html__('Надсилання...', 'ms-portfolio'),
                'success'      => esc_html__('Дякую! Заявку надіслано. Я зв\'яжуся з вами найближчим часом.', 'ms-portfolio'),
                'error'        => esc_html__('Помилка надсилання. Спробуйте пізніше або напишіть у Telegram.', 'ms-portfolio'),
                'networkError' => esc_html__('Помилка з\'єднання. Перевірте інтернет.', 'ms-portfolio'),
            ],
        ]);
    }
}
add_action('wp_enqueue_scripts', 'ms_portfolio_scripts');

/**
 * Preconnect to Google Fonts for performance.
 */
function ms_portfolio_resource_hints(array $urls, string $relation_type): array
{
    if ('preconnect' === $relation_type) {
        $urls[] = [
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        ];
        $urls[] = [
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        ];
    }
    return $urls;
}
add_filter('wp_resource_hints', 'ms_portfolio_resource_hints', 10, 2);
