<?php
/**
 * Single Portfolio Case Template
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('card-glass'); ?>>
                <header class="card-glass__header">
                    <h1 class="card-glass__title" style="font-size: var(--text-h1);"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="card-glass__image" style="margin: var(--space-6) 0;">
                        <?php the_post_thumbnail('portfolio-full'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-glass__body" style="font-size: var(--text-body); line-height: var(--leading-body);">
                    <?php the_content(); ?>
                </div>

                <footer class="card-glass__footer" style="margin-top: var(--space-8);">
                    <a href="<?php echo esc_url(home_url('/#portfolio')); ?>" class="btn btn--secondary">
                        &larr; <?php esc_html_e('Назад до всіх кейсів', 'ms-portfolio'); ?>
                    </a>
                </footer>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
