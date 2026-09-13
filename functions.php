<?php
/**
 * Theme Entry Point — functions.php
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// Theme configuration & setup
require_once get_template_directory() . '/inc/setup.php';

// Asset enqueuing (CSS / JS)
require_once get_template_directory() . '/inc/enqueue.php';

// Custom Post Types
require_once get_template_directory() . '/inc/cpt-portfolio.php';
require_once get_template_directory() . '/inc/cpt-reviews.php';

// ACF Pro integration & JSON sync
require_once get_template_directory() . '/inc/acf-fields.php';

// Polylang multilingual integration
require_once get_template_directory() . '/inc/polylang.php';

// Telegram Bot API integration
require_once get_template_directory() . '/inc/telegram-bot.php';

// AJAX handlers
require_once get_template_directory() . '/inc/ajax-handlers.php';
