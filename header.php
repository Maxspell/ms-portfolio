<?php
/**
 * Header template.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header" id="header">
    <div class="container">
        <div class="header__inner">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__brand" rel="home">
                <span class="header__logo-badge">MS</span>
                <span>Макс Стіжко</span>
            </a>

            <?php get_template_part('template-parts/header/nav'); ?>

            <div class="header__actions">
                <?php get_template_part('template-parts/header/lang-switcher'); ?>

                <a href="#contact" class="btn btn--primary btn--sm">
                    <span><?php esc_html_e('Обговорити проєкт', 'ms-portfolio'); ?></span>
                </a>

                <button class="header__toggle" type="button" aria-label="<?php esc_attr_e('Перемкнути меню', 'ms-portfolio'); ?>" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
