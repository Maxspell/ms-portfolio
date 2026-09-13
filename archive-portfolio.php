<?php
/**
 * Archive Portfolio Cases Template
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <div class="section-heading section-heading--centered">
            <span class="section-heading__accent"></span>
            <h1 class="section-heading__title"><?php post_type_archive_title(); ?></h1>
            <p class="section-heading__description">
                <?php esc_html_e('Повний архів реалізованих рішень та кейсів розробки.', 'ms-portfolio'); ?>
            </p>
        </div>

        <?php if (have_posts()) : ?>
            <div class="grid grid--3-col">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card-glass card-glass--interactive'); ?>>
                        <div class="card-glass__header">
                            <h2 class="card-glass__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </div>
                        <div class="card-glass__body">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="card-glass__footer">
                            <a href="<?php the_permalink(); ?>" class="btn btn--secondary btn--sm">
                                <?php esc_html_e('Детальніше', 'ms-portfolio'); ?> &rarr;
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div style="margin-top: var(--space-8);">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <div class="card-glass">
                <p><?php esc_html_e('Кейси відсутні.', 'ms-portfolio'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
