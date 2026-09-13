<?php
/**
 * Section: Reviews
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$reviews = [
    [
        'author'  => 'Олександр Мельник',
        'role'    => 'CEO, Digital Agency Nova',
        'content' => 'Працюємо з Максом на субпідряді вже понад рік. Здав 6 складних e-commerce проєктів без жодного затримання дедлайну. Код настільки чистий, що підтримувати його — одне задоволення.',
    ],
    [
        'author'  => 'Ірина Ковальчук',
        'role'    => 'Співзасновниця бренду одягу',
        'content' => 'Перенесли наш старий магазин з повільного шаблону на нову тему від Макса. Швидкість завантаження виросла втричі, а конверсія чекауту піднялася на 28% у перший же місяць.',
    ],
    [
        'author'  => 'Денис Гриценко',
        'role'    => 'Product Owner, FinTech Group',
        'content' => 'Макс реалізував кастомні калькулятори та двосторонню інтеграцію з нашою CRM через WP REST API. Дуже ціную відповідальний підхід до безпеки та швидку комунікацію в Telegram.',
    ],
];
?>

<section class="section reviews-section" id="reviews">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Відгуки клієнтів та партнерів', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Довіра вибудовується на результатах. Що говорять ті, з ким ми вже запустили спільні проєкти.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="grid grid--3-col">
            <?php foreach ($reviews as $review) : ?>
                <div class="card-glass">
                    <div class="card-glass__body">
                        <p style="font-style: italic; margin-bottom: var(--space-6);">
                            "<?php echo esc_html($review['content']); ?>"
                        </p>
                    </div>
                    <div class="card-glass__footer" style="border-top: 1px solid var(--border-subtle); padding-top: var(--space-4);">
                        <div>
                            <h4 style="font-size: var(--text-h4); color: var(--text-primary); margin-bottom: 2px;">
                                <?php echo esc_html($review['author']); ?>
                            </h4>
                            <span style="font-size: var(--text-xs); color: var(--accent-primary);">
                                <?php echo esc_html($review['role']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
