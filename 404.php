<?php
/**
 * 404 Not Found Template
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section" style="text-align: center; padding: var(--space-32) var(--space-6);">
        <div class="card-glass" style="max-width: 600px; margin: 0 auto; padding: var(--space-12);">
            <div class="hero__status status-indicator" style="margin-bottom: var(--space-6); display: inline-flex;">
                <span class="status-indicator__dot" style="background: var(--color-error);"></span>
                <span class="status-indicator__text" style="color: var(--color-error);"><?php esc_html_e('Помилка 404', 'ms-portfolio'); ?></span>
            </div>

            <h1 style="font-size: var(--text-display); color: var(--text-primary); margin-bottom: var(--space-4);">
                404
            </h1>

            <p style="color: var(--text-secondary); margin-bottom: var(--space-8); line-height: var(--leading-body);">
                <?php esc_html_e('Сторінку не знайдено або її було переміщено. Спробуйте повернутися на головну сторінку портфоліо.', 'ms-portfolio'); ?>
            </p>

            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--lg">
                <span><?php esc_html_e('На головну', 'ms-portfolio'); ?></span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
