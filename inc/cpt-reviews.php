<?php
/**
 * Register Custom Post Type: Reviews (Testimonials).
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

if (!function_exists('ms_portfolio_register_cpt_reviews')) {
    /**
     * Register Custom Post Type for Client Reviews.
     */
    function ms_portfolio_register_cpt_reviews(): void
    {
        $labels = [
            'name'                  => _x('Відгуки', 'Post Type General Name', 'ms-portfolio'),
            'singular_name'         => _x('Відгук', 'Post Type Singular Name', 'ms-portfolio'),
            'menu_name'             => __('Відгуки', 'ms-portfolio'),
            'name_admin_bar'        => __('Відгук', 'ms-portfolio'),
            'all_items'             => __('Усі відгуки', 'ms-portfolio'),
            'add_new_item'          => __('Додати новий відгук', 'ms-portfolio'),
            'add_new'               => __('Додати відгук', 'ms-portfolio'),
            'new_item'              => __('Новий відгук', 'ms-portfolio'),
            'edit_item'             => __('Редагувати відгук', 'ms-portfolio'),
            'update_item'           => __('Оновити відгук', 'ms-portfolio'),
            'view_item'             => __('Переглянути відгук', 'ms-portfolio'),
            'search_items'          => __('Шукати відгуки', 'ms-portfolio'),
        ];

        $args = [
            'label'                 => __('Відгук', 'ms-portfolio'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 21,
            'menu_icon'             => 'dashicons-testimonial',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        ];

        register_post_type('review', $args);
    }
}
add_action('init', 'ms_portfolio_register_cpt_reviews');
