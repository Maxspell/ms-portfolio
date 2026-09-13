<?php
/**
 * Section: Workflow (5 Steps)
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$steps = [
    [
        'num'   => '01',
        'title' => 'Аналіз & ТЗ',
        'desc'  => 'Детальний аудит завдань бізнесу, проєктування структури сторінок, підбір модулів та фіксація кошторису і термінів у договорі.',
    ],
    [
        'num'   => '02',
        'title' => 'Дизайн & Верстка',
        'desc'  => 'Створення адаптивного інтерфейсу за методологією БЭМ на чистих HTML5/CSS3. Фокус на UX, доступність та мікро-анімації.',
    ],
    [
        'num'   => '03',
        'title' => 'Кастомна посадка на WP',
        'desc'  => 'Розробка чистої теми без важких плагінів. Налаштування полів ACF Pro або блоків Gutenberg для легкого керування будь-яким контентом.',
    ],
    [
        'num'   => '04',
        'title' => 'Тестування & Оптимізація',
        'desc'  => 'Перевірка безпеки (nonce, sanitization), кросбраузерності та валідації. Досягнення 95+ балів Google PageSpeed на реальних даних.',
    ],
    [
        'num'   => '05',
        'title' => 'Запуск & Інструкція',
        'desc'  => 'Перенесення сайту на ваш хостинг, налаштування SSL та бекапів, запис персональної відео-інструкції з керування сайтом.',
    ],
];
?>

<section class="section workflow-section" id="workflow">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Прозорий процес співпраці', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Жодних сюрпризів. Кожен етап має чіткий результат та проходить попереднє погодження перед стартом наступного.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="grid grid--3-col" style="gap: var(--space-6);">
            <?php foreach ($steps as $step) : ?>
                <div class="workflow-step">
                    <div class="workflow-step__num"><?php echo esc_html($step['num']); ?></div>
                    <h3 class="workflow-step__title"><?php echo esc_html($step['title']); ?></h3>
                    <p class="workflow-step__desc"><?php echo esc_html($step['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
