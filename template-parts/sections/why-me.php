<?php
/**
 * Section: Why Me (Clean Code vs Page Builders)
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$advantages = [
    [
        'title' => 'Чистий код проти Elementor / Divi',
        'desc'  => 'Конструктори додають 2–5 МБ зайвого сміття, сотні непотрібних DOM-вузлів та сповільнюють сервер. Мій код створюється з нуля під ваші потреби, генерується за мілісекунди.',
    ],
    [
        'title' => 'Безпека без десятків дірявих плагінів',
        'desc'  => '90% зломів сайтів на WordPress стаються через застарілі сторонні плагіни. Я пишу кастомні рішення на нативному API ядра, що мінімізує будь-які вектори атак.',
    ],
    [
        'title' => 'Пряма комунікація без "глухого телефону"',
        'desc'  => 'Ви спілкуєтеся безпосередньо з розробником, який пише код. Без менеджерів, які не розуміють технічні деталі. Швидкі відповіді та точна реалізація ідей.',
    ],
];
?>

<section class="section why-me-section" id="why-me">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Чому саме чиста кастомна розробка', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Чому успішні бізнеси обирають індивідуальні рішення замість шаблонних конструкторів.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="grid grid--3-col">
            <?php foreach ($advantages as $adv) : ?>
                <div class="card-glass">
                    <div class="card-glass__header">
                        <span class="badge badge--accent"><?php esc_html_e('Перевага', 'ms-portfolio'); ?></span>
                        <h3 class="card-glass__title" style="margin-top: var(--space-3);"><?php echo esc_html($adv['title']); ?></h3>
                    </div>
                    <div class="card-glass__body">
                        <p><?php echo esc_html($adv['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
