<?php
/**
 * The main template file (Fallback).
 *
 * @package MSPortfolio
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main">
    <div class="container section">
        <?php if (have_posts()) : ?>
            <div class="grid grid--3-col">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card-glass'); ?>>
                        <div class="card-glass__header">
                            <h2 class="card-glass__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </div>
                        <div class="card-glass__body">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <div class="card-glass">
                <p><?php esc_html_e('Контент не знайдено.', 'ms-portfolio'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
