<?php
/**
 * Setup theme features and definitions.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

if (!function_exists('ms_portfolio_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function ms_portfolio_setup(): void
    {
        // Make theme available for translation.
        load_theme_textdomain('ms-portfolio', get_template_directory() . '/languages');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Custom image sizes for portfolio mockups.
        add_image_size('portfolio-card', 640, 420, true);
        add_image_size('portfolio-full', 1200, 750, true);

        // Switch default core markup for search form, comment form, etc. to output valid HTML5.
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        // Register Primary Navigation and Footer Menu.
        register_nav_menus([
            'primary-menu' => esc_html__('Primary Menu', 'ms-portfolio'),
            'footer-menu'  => esc_html__('Footer Menu', 'ms-portfolio'),
        ]);
    }
}
add_action('after_setup_theme', 'ms_portfolio_setup');
