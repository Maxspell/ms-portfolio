<?php
/**
 * Section: Trust Bar (KPIs & Metrics)
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$stats = [
    [
        'number' => '95+',
        'label'  => esc_html__('Google PageSpeed score (Mobile & Desktop)', 'ms-portfolio'),
    ],
    [
        'number' => '100%',
        'label'  => esc_html__('Дотримання термінів за договором', 'ms-portfolio'),
    ],
    [
        'number' => '0%',
        'label'  => esc_html__('Конструкторів (Zero Bloatware)', 'ms-portfolio'),
    ],
    [
        'number' => '12 міс',
        'label'  => esc_html__('Гарантійна підтримка та супровід коду', 'ms-portfolio'),
    ],
];
?>

<section class="section trust-bar" id="trust-bar">
    <div class="container">
        <div class="grid grid--4-col">
            <?php foreach ($stats as $stat) : ?>
                <div class="stat-card">
                    <span class="stat-card__number"><?php echo esc_html($stat['number']); ?></span>
                    <span class="stat-card__label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
