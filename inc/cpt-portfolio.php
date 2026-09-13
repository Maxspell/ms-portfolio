<?php
/**
 * Register Custom Post Type: Portfolio (Cases).
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

if (!function_exists('ms_portfolio_register_cpt_portfolio')) {
    /**
     * Register Custom Post Type for Portfolio Cases & its Taxonomies.
     */
    function ms_portfolio_register_cpt_portfolio(): void
    {
        $labels = [
            'name'                  => _x('Кейси', 'Post Type General Name', 'ms-portfolio'),
            'singular_name'         => _x('Кейс', 'Post Type Singular Name', 'ms-portfolio'),
            'menu_name'             => __('Портфоліо', 'ms-portfolio'),
            'name_admin_bar'        => __('Кейс', 'ms-portfolio'),
            'archives'              => __('Архів кейсів', 'ms-portfolio'),
            'all_items'             => __('Усі кейси', 'ms-portfolio'),
            'add_new_item'          => __('Додати новий кейс', 'ms-portfolio'),
            'add_new'               => __('Додати кейс', 'ms-portfolio'),
            'new_item'              => __('Новий кейс', 'ms-portfolio'),
            'edit_item'             => __('Редагувати кейс', 'ms-portfolio'),
            'update_item'           => __('Оновити кейс', 'ms-portfolio'),
            'view_item'             => __('Переглянути кейс', 'ms-portfolio'),
            'search_items'          => __('Шукати кейси', 'ms-portfolio'),
        ];

        $args = [
            'label'                 => __('Кейс', 'ms-portfolio'),
            'labels'                => $labels,
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
            'taxonomies'            => ['portfolio_category'],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'portfolio',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
            'rewrite'               => ['slug' => 'portfolio', 'with_front' => false],
        ];

        register_post_type('portfolio', $args);

        // Register Portfolio Category Taxonomy
        $tax_labels = [
            'name'              => _x('Категорії кейсів', 'taxonomy general name', 'ms-portfolio'),
            'singular_name'     => _x('Категорія кейсу', 'taxonomy singular name', 'ms-portfolio'),
            'search_items'      => __('Шукати категорії', 'ms-portfolio'),
            'all_items'         => __('Усі категорії', 'ms-portfolio'),
            'edit_item'         => __('Редагувати категорію', 'ms-portfolio'),
            'update_item'       => __('Оновити категорію', 'ms-portfolio'),
            'add_new_item'      => __('Додати нову категорію', 'ms-portfolio'),
            'new_item_name'     => __('Назва нової категорії', 'ms-portfolio'),
            'menu_name'         => __('Категорії', 'ms-portfolio'),
        ];

        register_taxonomy('portfolio_category', ['portfolio'], [
            'hierarchical'      => true,
            'labels'            => $tax_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'portfolio-category'],
        ]);
    }
}
add_action('init', 'ms_portfolio_register_cpt_portfolio');
