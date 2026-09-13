<?php
/**
 * Navigation Menu Template Part.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<nav class="header__nav" aria-label="<?php esc_attr_e('Головне меню', 'ms-portfolio'); ?>">
    <?php
    if (has_nav_menu('primary-menu')) :
        wp_nav_menu([
            'theme_location' => 'primary-menu',
            'container'      => false,
            'menu_class'     => 'header__menu',
            'fallback_cb'    => false,
            'depth'          => 1,
        ]);
    else :
    ?>
        <ul class="header__menu">
            <li><a href="#portfolio" class="header__link"><?php esc_html_e('Кейси', 'ms-portfolio'); ?></a></li>
            <li><a href="#services" class="header__link"><?php esc_html_e('Послуги', 'ms-portfolio'); ?></a></li>
            <li><a href="#workflow" class="header__link"><?php esc_html_e('Процес', 'ms-portfolio'); ?></a></li>
            <li><a href="#why-me" class="header__link"><?php esc_html_e('Чому я', 'ms-portfolio'); ?></a></li>
            <li><a href="#reviews" class="header__link"><?php esc_html_e('Відгуки', 'ms-portfolio'); ?></a></li>
            <li><a href="#faq" class="header__link"><?php esc_html_e('FAQ', 'ms-portfolio'); ?></a></li>
            <li><a href="#contact" class="header__link"><?php esc_html_e('Контакти', 'ms-portfolio'); ?></a></li>
        </ul>
    <?php endif; ?>
</nav>
