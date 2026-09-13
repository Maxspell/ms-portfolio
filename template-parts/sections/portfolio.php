<?php
/**
 * Section: Portfolio Cases
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// Query portfolio custom post type
$portfolio_query = new WP_Query([
    'post_type'      => 'portfolio',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'DESC',
]);

// Fallback test cases until ACF / CPT entries are populated in WordPress admin
$fallback_cases = [
    [
        'title'    => 'AutoParts Pro — B2B E-Commerce на WooCommerce',
        'niche'    => 'Автозапчастини & Дистрибуція',
        'desc'     => 'Кастомна тема для 45,000+ товарів. Інтеграція 1C, LiqPay/WayForPay, AJAX-фільтрація без перезавантаження та миттєвий пошук.',
        'speed'    => '97 / 100',
        'tags'     => ['WooCommerce', 'PHP 8.2', 'REST API', 'ACF Pro'],
        'image'    => get_template_directory_uri() . '/assets/images/cases/autoparts-pro.jpg',
        'link'     => '#',
    ],
    [
        'title'    => 'FinTech Global — Корпоративна платформа',
        'niche'    => 'Фінансові технології',
        'desc'     => 'Мультиязичний корпоративний сайт (Polylang), Headless калькулятори тарифів, високий рівень безпеки та захист від ботів.',
        'speed'    => '99 / 100',
        'tags'     => ['WordPress Pro', 'Polylang', 'Tailored Admin', 'Security Hardened'],
        'image'    => get_template_directory_uri() . '/assets/images/cases/fintech-global.jpg',
        'link'     => '#',
    ],
    [
        'title'    => 'Aesthetic Clinic — Преміальний медичний портал',
        'niche'    => 'Медицина & Косметологія',
        'desc'     => 'Кастомні Gutenberg-блоки, онлайн-запис до лікарів, синхронізація з CRM DoctorEleks та інтерактивна галерея до/після.',
        'speed'    => '96 / 100',
        'tags'     => ['Custom Gutenberg', 'CRM Integration', 'WebP/AVIF', 'ACF Flexible'],
        'image'    => get_template_directory_uri() . '/assets/images/cases/aesthetic-clinic.jpg',
        'link'     => '#',
    ],
];
?>

<section class="section portfolio-section" id="portfolio">
    <div class="container">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h2 class="section-heading__title"><?php esc_html_e('Вибрані кейси та розробки', 'ms-portfolio'); ?></h2>
            <p class="section-heading__description">
                <?php esc_html_e('Реальні проєкти, де швидкість завантаження, чистий код та зручна адмінка принесли бізнесу вимірювані результати.', 'ms-portfolio'); ?>
            </p>
        </div>

        <div class="grid grid--3-col">
            <?php if ($portfolio_query->have_posts()) : ?>
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                    $post_id   = get_the_ID();
                    $niche     = function_exists('get_field') ? (get_field('case_niche', $post_id) ?: '') : '';
                    $speed     = function_exists('get_field') ? (get_field('case_pagespeed', $post_id) ?: '98 / 100') : '98 / 100';
                    $desc      = function_exists('get_field') ? (get_field('case_short_desc', $post_id) ?: get_the_excerpt()) : get_the_excerpt();
                    $url       = function_exists('get_field') ? (get_field('case_project_url', $post_id) ?: get_permalink()) : get_permalink();
                    
                    // Image resolution (ACF field or Post Thumbnail)
                    $img_url = '';
                    $img_alt = get_the_title();
                    if (function_exists('get_field')) {
                        $acf_img = get_field('case_preview_image', $post_id);
                        if (is_array($acf_img) && !empty($acf_img['url'])) {
                            $img_url = (string) $acf_img['url'];
                            $img_alt = !empty($acf_img['alt']) ? (string) $acf_img['alt'] : get_the_title();
                        }
                    }
                    if (empty($img_url) && has_post_thumbnail()) {
                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        if ($thumb) {
                            $img_url = $thumb[0];
                        }
                    }

                    // Tech stack tags
                    $tags = [];
                    if (function_exists('have_rows') && have_rows('case_tech_stack', $post_id)) {
                        while (have_rows('case_tech_stack', $post_id)) {
                            the_row();
                            $tag_val = get_sub_field('tech_name');
                            if (!empty($tag_val)) {
                                $tags[] = (string) $tag_val;
                            }
                        }
                    }
                ?>
                    <article class="card-glass card-glass--interactive">
                        <div class="card-glass__header">
                            <?php if (!empty($niche)) : ?>
                                <span class="badge badge--accent"><?php echo esc_html($niche); ?></span>
                            <?php endif; ?>
                            <h3 class="card-glass__title" style="margin-top: var(--space-3);">
                                <?php if (!empty($url) && $url !== '#') : ?>
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                        <?php the_title(); ?>
                                    </a>
                                <?php else : ?>
                                    <?php the_title(); ?>
                                <?php endif; ?>
                            </h3>
                        </div>

                        <?php if (!empty($img_url)) : ?>
                            <div class="card-glass__image">
                                <img
                                    src="<?php echo esc_url($img_url); ?>"
                                    alt="<?php echo esc_attr($img_alt); ?>"
                                    loading="lazy"
                                    width="640"
                                    height="400"
                                >
                            </div>
                        <?php endif; ?>

                        <div class="card-glass__body">
                            <p><?php echo esc_html($desc); ?></p>
                            <?php if (!empty($speed)) : ?>
                                <div style="margin-top: var(--space-4);">
                                    <span class="badge badge--success">⚡ PageSpeed: <?php echo esc_html($speed); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($tags)) : ?>
                            <div class="card-glass__footer">
                                <?php foreach ($tags as $tag) : ?>
                                    <span class="tag">
                                        <span class="tag__label"><?php echo esc_html($tag); ?></span>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php else : ?>

                <?php foreach ($fallback_cases as $case) : ?>
                    <article class="card-glass card-glass--interactive">
                        <div class="card-glass__header">
                            <span class="badge badge--accent"><?php echo esc_html($case['niche']); ?></span>
                            <h3 class="card-glass__title" style="margin-top: var(--space-3);"><?php echo esc_html($case['title']); ?></h3>
                        </div>

                        <?php if (!empty($case['image'])) : ?>
                            <div class="card-glass__image">
                                <img
                                    src="<?php echo esc_url($case['image']); ?>"
                                    alt="<?php echo esc_attr($case['title']); ?>"
                                    loading="lazy"
                                    width="640"
                                    height="400"
                                >
                            </div>
                        <?php endif; ?>

                        <div class="card-glass__body">
                            <p><?php echo esc_html($case['desc']); ?></p>
                            <div style="margin-top: var(--space-4);">
                                <span class="badge badge--success">⚡ PageSpeed: <?php echo esc_html($case['speed']); ?></span>
                            </div>
                        </div>

                        <div class="card-glass__footer">
                            <?php foreach ($case['tags'] as $tag) : ?>
                                <span class="tag">
                                    <span class="tag__label"><?php echo esc_html($tag); ?></span>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</section>
