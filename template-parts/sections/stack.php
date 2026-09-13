<?php
/**
 * Section: Tech Stack
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$skills = [
    ['name' => 'WordPress Custom Themes / Block API', 'level' => 98],
    ['name' => 'Modern PHP 8.x (OOP, Clean Architecture)', 'level' => 95],
    ['name' => 'WooCommerce & Custom Gateways', 'level' => 94],
    ['name' => 'ACF Pro / Flexible Content Systems', 'level' => 98],
    ['name' => 'WP REST API & Webhooks Integration', 'level' => 92],
    ['name' => 'Frontend Performance (HTML5, Vanilla CSS/JS, BEM)', 'level' => 96],
];
?>

<section class="section stack-section" id="stack">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Технологічний стек та експертиза', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Працюю тільки з актуальними версіями PHP, WordPress Core стандартами та надійними інструментами розробки.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="card-glass" style="max-width: 860px; margin: 0 auto;">
            <div class="grid grid--2-col" style="gap: var(--space-6);">
                <?php foreach ($skills as $skill) : ?>
                    <div class="progress-bar">
                        <div class="progress-bar__header">
                            <span class="progress-bar__label"><?php echo esc_html($skill['name']); ?></span>
                            <span class="progress-bar__value"><?php echo esc_html((string)$skill['level']); ?>%</span>
                        </div>
                        <div class="progress-bar__track">
                            <div class="progress-bar__fill" style="--progress: <?php echo esc_attr((string)$skill['level']); ?>%;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
