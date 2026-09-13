<?php
/**
 * Language Switcher Template Part.
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'uk';
$languages    = function_exists('pll_the_languages') ? pll_the_languages(['raw' => 1]) : [];
?>

<div class="lang-switcher" aria-label="<?php esc_attr_e('Мова сайту / Language', 'ms-portfolio'); ?>">
    <?php if (!empty($languages)) : ?>
        <?php foreach ($languages as $lang) : ?>
            <a href="<?php echo esc_url($lang['url']); ?>"
               class="lang-switcher__item <?php echo $lang['current_lang'] ? 'lang-switcher__item--active' : ''; ?>"
               title="<?php echo esc_attr($lang['name']); ?>"
               aria-current="<?php echo $lang['current_lang'] ? 'true' : 'false'; ?>">
                <?php echo esc_html(strtoupper($lang['slug'])); ?>
            </a>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- Fallback static toggle if Polylang is not yet activated -->
        <span class="lang-switcher__item lang-switcher__item--active">UA</span>
        <span class="lang-switcher__item">EN</span>
    <?php endif; ?>
</div>
