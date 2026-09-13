<?php
/**
 * ACF Pro Local JSON synchronization and field group helpers.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

/**
 * Save ACF JSON to theme's acf-json directory for Git tracking.
 */
function ms_portfolio_acf_json_save_point(string $path): string
{
    return get_template_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'ms_portfolio_acf_json_save_point');

/**
 * Load ACF JSON from theme's acf-json directory.
 */
function ms_portfolio_acf_json_load_point(array $paths): array
{
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'ms_portfolio_acf_json_load_point');
