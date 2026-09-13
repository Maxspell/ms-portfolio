<?php
/**
 * Section: Services
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$services = [
    [
        'title' => 'Сайти для бізнесу під ключ',
        'desc'  => 'Landing page, корпоративні сайти та каталоги. Повна кастомна посадка на WordPress з ACF Pro. Нуль непотрібних плагінів, максимальна швидкість.',
        'tags'  => ['Custom Themes', 'ACF Pro Flexible', 'Zero Builders'],
    ],
    [
        'title' => 'E-commerce на WooCommerce',
        'desc'  => 'Швидкі інтернет-магазини з оптимізованим чекаутом. Інтеграція платіжних систем (Monobank, LiqPay, Stripe), служб доставок (Нова Пошта) та складського обліку.',
        'tags'  => ['WooCommerce', 'Payment Gateways', 'Delivery API'],
    ],
    [
        'title' => 'Кастомний бекенд на PHP',
        'desc'  => 'Розробка кастомних плагінів, розширення функціоналу теми, кастомні REST API ендпоінти, вебхуки та двостороння синхронізація з будь-якими CRM.',
        'tags'  => ['OOP PHP 8.x', 'WP REST API', 'Custom Plugins'],
    ],
    [
        'title' => 'Оптимізація та редизайн',
        'desc'  => 'Прискорення повільних сайтів до 95+ балів PageSpeed. Перенесення старих сайтів з Elementor/Divi на чистий код, усунення вразливостей та аудит безпеки.',
        'tags'  => ['PageSpeed 95+', 'Elementor Refactoring', 'WP Security'],
    ],
];
?>

<section class="section services-section" id="services">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Послуги та напрямки розробки', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Фокусуюся виключно на надійних технічних рішеннях, які працюють роками без збоїв та зависань.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="grid grid--2-col">
            <?php foreach ($services as $service) : ?>
                <div class="card-glass">
                    <div class="card-glass__header">
                        <h3 class="card-glass__title"><?php echo esc_html($service['title']); ?></h3>
                    </div>
                    <div class="card-glass__body">
                        <p><?php echo esc_html($service['desc']); ?></p>
                    </div>
                    <div class="card-glass__footer">
                        <?php foreach ($service['tags'] as $tag) : ?>
                            <span class="badge badge--outline"><?php echo esc_html($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
